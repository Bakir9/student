<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Poll;
use App\Option_Poll;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class PollController extends Controller
{
    
    
    //Retriving all poll from database
    public function allPoll()
    {
        
        $polls = Poll::all();
        
        return view('poll.list_all_poll',compact('polls'));
    }

    //Retriving only poll for one user
    public function myPoll()
    {   
        $user_id = auth()->user()->id;
        $polls = Poll::where('user_id', $user_id)->get();
        
        return view('poll.my_poll',compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $messages = [
            'question.required' => 'Question cannot be empty',
            'option.required' => 'Option cannot be empty',
            'start_at.required' => 'Start date cannot be empty',
            'end_at.required' => 'End date cannot be empty'
        ];
        
        $this->validate($request, [
            'question' => 'required',
            'option' => 'required|array',
            'start_at' => 'required',
            'end_at' => 'required'
        ]);
        $validatePoll = $request->all();

        $start_at = request('start_at');
        $end_at = request('end_at');
        
        $countPoll = Poll::where(function ($query) use ($start_at, $end_at) {
            $query->where(function ($query) use ($start_at, $end_at) {
               $query->where('start_at', '>=', $start_at)
                       ->where('end_at', '<', $start_at);
               })
               ->orWhere(function ($query) use ($start_at, $end_at) {
                   $query->where('start_at', '<', $end_at)
                           ->where('end_at', '>=', $end_at);
               });
           })->count();

           if($countPoll > 0) {
             toast('Please use another date !','warning');
           } else {
            if($validatePoll){
                $poll = new Poll();
                $poll->user_id = request()->user()->id;
                $poll->question = request()->question;
                $poll->start_at = request()->start_at;
                $poll->end_at = request()->end_at;
                $poll->isActive = 2;
                $options = request()->option;
             
                if($poll->save()){
                    foreach ($options as $option){
                        $poll->option_polls()->createMany([
                            ['option' => $option], 
                        ]);
                    }
                } else {
                    toast("Something wrong !",'warning');
                }
                toast("Poll created !",'success');
            }  
           }
        
        return redirect('/poll');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poll = Poll::find($id);
        $options = $poll->option_polls;
        $sum  = $poll->option_polls()->sum('vote');
        
        return view('poll.edit_poll', compact('poll', 'options', 'sum'));
    }

    /**
     * Update poll
     * if poll is currently active, update can afford only on END DATE
     */
    public function update($id)
    {
        $poll = Poll::find($id);
        
        if($poll->isActive == 1 ) {
            $poll->end_at = request('end_at');
        } else {
            $poll->user_id = request()->user()->id;
            $poll->question = request()->question;
            $poll->start_at = request()->start_at;
            $poll->end_at = request()->end_at;
            $options = request()->option;
            
            if($poll->save()){
                $poll->option_polls()->delete();

                foreach ($options as $option){
                    $poll->option_polls()->createMany([
                        ['option' => $option], 
                    ]);
                }

                toast('Poll updated !','success');
            } else {
                toast('Something wrong !','error');
            }
        }
        return redirect('/poll/' .$poll->id. '/edit');
    }

   /**
    * Close active or waiting poll (isActive = 0)
   */
    public function closePoll($id){
        $poll = Poll::find($id);
        
        $poll->isActive = 0;
       
       if($poll->save()) {
        toast('Poll is closed!','success');
       } else {
        toast('Something wrong !','warning');
       }

        return redirect('/list_poll');
        
    }

    public function activePoll()
    {   
        $poll = Poll::where('isActive',2)
                    ->orWhere(function($query) {
                        $query->whereDate('start_at',Carbon::now());
                    })->first(); 
        
        if($poll != null) {
            $poll->isActive = 1;
            $poll->save();
        } 
        //return compact('poll');
    }

    public function checkActive()
    {
        $activePoll = Poll::find('isActive',1)->firstOrFail();
        $options = $activePoll->option_polls()->sum('vote');
        
        return ([
            'activePoll' => $activePoll,
            'options' => $options, 
        ]);
    }

    /**
     * Delete poll older than 15 days
     */
     public function deleteOldPoll()
     {
        $polls = Poll::where('isActive', '0')->get();
          if(count($polls) > 0) {
            foreach($polls as $poll) {
              $endDate = $poll->created_at;
            
              if($endDate->subDays(10)->diffInDays() > 5 ){
                  
                $poll->delete();
                $poll->option_polls()->delete();
                
               toast('All Events are deleted!','success');
              }
            }
          } else {
            toast('Nothing to delete!','warning');
          }
        return redirect('list_poll');
     }

    /**
     * Vote
     */
    public function vote()
    {
        $validateVote = request()->validate([
            'option' => 'required',
        ]);

        if($validateVote) {
            $votes = request('option');
            $voteIncrement = DB::table('option_polls')->where('id', $votes)->increment('vote');

            toast("Thank you for vote !",'success');
            $vote = ['voted' =>  1, 'user_id' => auth()->user()->id ];
            
            $isVoted = json_encode($vote);
            
            return redirect()->back()->cookie('voted',$isVoted,30);
        }
    }

    public function getResult($id) {
        $poll = Poll::find($id);

        $options = $poll->option_polls;

        $sum =  $poll->option_polls()->sum('vote');

        return view('poll.poll-result', compact('poll','options','sum'));
    }

    public function delete($id) 
    {
        $poll = Poll::find($id);
        if($poll->isActive == 1) {
            toast('Poll is active! Cant delete !','warning');
        } else {
            $poll->delete();
            $poll->option_polls()->delete();

            Alert::success('Success', 'Deleted !');
        }
        return redirect('/list_poll');
    }
}
