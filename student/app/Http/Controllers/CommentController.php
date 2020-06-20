<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\Comment;
use App\Blog;

class CommentController extends Controller
{
    public function create()
    {
        
       $validateComment = request()->validate([
            'username' => 'required',
            'content' => 'required'
       ]);
    
       
       if($validateComment) {
        $comment = new Comment(request([
            'username','content'
        ]));
        
        $post = Blog::find($id);
        $post->comments()->save($comment);

        Alert::success('Success', 'Commnent successfully added');
        return redirect('blog/'.$post->post_slug);

        } else {
            Alert::error('Error', 'Something wrong !');
        
            return redirect('blog/'.$post->post_slug);
        }    

    }
}
