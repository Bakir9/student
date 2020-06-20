<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;
use File;
use eloquentFilter\QueryFilter\ModelFilters\ModelFilters;

use App\User;
use App\Job;
use App\Poll;
use App\Option_Poll;



class JobController extends Controller
{
    public function index()
    {
        return redirect('job');
    }
    public function store()
    {  
        $validate_job = request()->validate([
            'job_title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'address' => 'required',
            'type_of_job' => 'required|array',
            'experience' => 'required',
            'valid_until' => 'required',
            'e_mail' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
            'content' => 'required'
        ]);
        
        if($validate_job) {
            if(request()->hasFile('company_logo')) {
                $image = request()->file('company_logo');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                Image::make($image)->resize(100, 100)->save($location);
                Job::create([
                    'user_id' => auth()->user()->id,
                    'job_title' => request('job_title'),
                    'company' => request('company'),
                    'location' => request('location'),
                    'address' => request('address'),
                    'type_of_job' =>request('type_of_job'),
                    'level' => request('experience'),
                    'valid_until' => request('valid_until'),
                    'e_mail' => request('e_mail'),
                    'image' => $filename,
                    'content' => request('content')
                ]);
            } else {
                $default = 'default.png';
                Job::create([
                    'user_id' => auth()->user()->id,
                    'job_title' => request('job_title'),
                    'company' => request('company'),
                    'location' => request('location'),
                    'address' => request('address'),
                    'type_of_job' =>request('type_of_job'),
                    'level' => request('experience'),
                    'valid_until' => request('valid_until'),
                    'e_mail' => request('e_mail'),
                    'image' => $default,
                    'content' => request('content')
                ]);
           }
            Alert::success('Success!','Job offer created');
            $request->session()->put('action', 'Created new job');
        } else {
             Alert::warning('Oops!','Something wrong !');
          }
     return view('jobs.create_job');
    }

    public function activeJobs()
    {
        $jobs = Job::where('valid_until', '<=', now())->get();
        $poll = Poll::firstWhere('isActive',1);
	    
        $options = $poll->option_polls;
        
        return view('jobs.jobs',compact('jobs','poll','options'));
    }

    public function jobs()
    {
        $jobs = Job::all();
        
        return view('jobs.list-jobs',compact('jobs','poll','options'));
    }

    public function jobDescription($id)
    {
        $job = Job::find($id);

        return view('jobs.details', compact('job'));
    }

    public function editJob(Job $job)
    {
        return view('jobs.edit_job',compact('job'));
    }

    public function update($id)
    {
        $job = Job::find($id);
        
        $updateJob = request()->validate([
            'job_title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'address' => 'required',
            'type_of_job' => 'required|array',
            'experience' => 'required',
            'valid_until' => 'required',
            'e_mail' => 'required',
            'content' => 'required' 
        ]);

            $job->job_title = request()->job_title;
            $job->company = request()->company;
            $job->location = request()->location;
            $job->address = request()->address;
            $job->type_of_job = request()->type_of_job;
            $job->level = request()->experience;
            $job->valid_until = request()->valid_until;
            $job->e_mail = request()->e_mail;
            $job->content = request()->content;

            if(request()->hasFile('company_logo')) {
                $image = request()->file('company_logo');
                $filename = time() . '.' .$image->getClientOriginalExtension();
                $location = public_path('images/' . $filename);
                
                Image::make($image)->resize(100, 100)->save($location);
                $oldImage = $job->image;
                $job->image = $filename;
                if($oldImage != 'default.png') {
                    //delete old image from database
                    unlink('images/'.$oldImage);
                } 
            }

            if($job->save()){
                Alert::success('Success!','Data updated');
            } else {
                Alert::warning('Warning!','Not updated');
            }
        return redirect('/job/' .$job->id. '/edit');
    }

    public function delete($id)
    {
        $job = Job::find($id);
        $deleteImage = $job->image;
       
        if($deleteImage == 'default.png') {
            $deleteJob = $job->delete();
        }
        else {
            unlink('images/'.$deleteImage);
            $deleteJob = $job->delete();
        }
        if($deleteJob) {
            Alert::success('Success', 'Job deleted !');
        } else {
            Alert::warning('Oops !', 'Something wrong !');
        }
        return redirect('/list-jobs');
    }
    
    public function myJobs()
    {
        $user = auth()->user()->id;
        $jobs = Job::where('user_id', $user)->get();

        return view('jobs.my-jobs',compact('jobs'));
    }

    public function filterJob(Request $request,Job $job)
    {
       $job = $job->newQuery();
       

       if($request->has('job_title')){
            $job->where('job_title', 'like', '%' . $request->input('job_title') .'%');
       }

       if($request->has('level') & $request->input('level') != "Choose..."){
           $job->where('level', $request->input('level'));
       }

       if($request->has('full_time')){
        $job->where('type_of_job','like', '%' .$request->input('full_time') . '%')->get();
       }

       if($request->has('part_time')){
        $job->where('type_of_job','like', '%' . $request->input('part_time'). '%')->get();
       }
       //dd($request->input('job_title'), $request->input('level'));
       $jobs = $job->get();
       return view ('jobs.jobs', compact('jobs', 'request'));
    }
}
