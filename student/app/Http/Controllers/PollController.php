<?php

namespace App\Http\Controllers;

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
        $validatePoll = $this->validate($request, [
            'question' => 'required',
            'option' => 'required|array',
            'start_at' => 'required',
            'end_at' => 'required'
        ]);
        
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
                Alert::success("Success ! Poll created !");
            } else {
                Alert::warning("Oops ! Something wrong !");
            }
            Alert::success("Success ! Poll Created!");
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
        
        return view('poll.edit_poll', compact('poll', 'options'));
    }

    /**
     * Update poll
     * if poll is currently active, update can afford only on END DATE
     */
    public function update($id)
    {
        $poll = Poll::find($id);
        
        if($poll->isActive == 1 || $poll->isActive == 2 ) {
            $poll->end_at = request('end_at');
        } else {
            $poll->user_id = request()->user()->id;
            $poll->question = request()->question;
            $poll->start_at = request()->start_at;
            $poll->end_at = request()->end_at;
            $options = request()->option;

            if($poll->save()){
                $poll->option_polls()->associate(request()->option);

                Alert::success('Success', 'Poll updated !');
            } else {
                Alert::warning('Ooops', 'Something wrong !');
            }
        }
        return view('/poll/' .$poll->id. '/edit');
    }

   //Close active or waiting poll (isActive = 0)
    public function closePoll($id){}

    public function checkWaiting()
    {
        $waitingPoll = Poll::where('isActive', 2)->firstOrFail()->update(['isActive' => 1]);
        
    }

    public function checkActive()
    {
        $activePoll = Poll::find('isActive',1)->firstOrFail();
        $options = $activePoll->option_polls()->sum('vote');
        
        return ([
            'options' => $options, 
        ]);

    }
    /**
     * Delete poll older than 15 days
     */
     public function deleteOldPoll()
     {
        $polls = Poll::where('isActive', '0')->get();
        
            foreach($polls as $poll) {
                $endDate = $poll->created_at;
               
                if($endDate->subDays(10)->diffInDays() > 5 ){
                    
                    $poll->delete();
                    $poll->option_polls()->delete();
                    //jos jedna izmjena
                }
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

            Alert::success("Thank you for vote !");
            $vote = ['voted' =>  1, 'user_id' => auth()->user()->id ];
            
            $isVoted = json_encode($vote);
            
            return redirect()->back()->cookie('voted',$isVoted,30);
        }
    }
}
