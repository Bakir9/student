<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;
use RealRashid\SweetAlert\Facades\Alert;

use App\Blog;
use App\Category;
use App\User;
use App\Tag;
use App\Comment;
use App\Poll;
use App\Option_Poll;

use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{

  public function show()
  {	
	if(request('tag')) {
		$blogs = Tag::where('name', request('tag'))->firstOrFail()->blogs;
	} else {
		$blogs = Blog::all();
	}
	
	
	return view('news.news', ['blogs' => $blogs]);
  }

  public function show_all()
  {	
	  $blogs = Blog::all();
	  return view('blog.home', ['blogs' => $blogs]);
  }

  public function index()
  {
    return view('blog.create_blog', [
		'tags' => Tag::all(),
		'categorys' =>  Category::all()
	]);
  }

  public function store()
    {
       request()->validate([
           'post_title' => 'required',
           'published' => 'required',
           'post_subtitle' => 'required',
           'post_category' => 'required',
           'post_slug' => 'required|unique:blogs',
		   'post_tag' => 'exists:tags,id|required',
		   'post_image' => 'image',
           'body' => 'required'
       ]);
      
	  //$blog = new Blog(request(['post_title','published','post_subtitle','post_slug','post_image','body']));
	  $blog = new Blog();
	
      $blog->title = request()->post_title;
      $blog->subtitle = request()->post_subtitle;
      $blog->post_slug = Str::slug(request()->post_slug, '-');
      $blog->published = request()->published;
      $blog->user_id = request()->user()->id;
      $blog->body = request()->body;
      //upload image
      $image = request()->file('post_image');
      $filename = time() . '.' . $image->getClientOriginalExtension();
      $location =  public_path('images/' . $filename);
      Image::make($image)->resize(1280, 350)->save($location);

	  $blog->image = $filename;
	  //updating category on blog
	  $blog->categorys()->associate(request('post_category'));

      if($blog->save()) {
		//inserting data into tags and categorys table
		$blog->tags()->attach(request('post_tag'));
		Alert::success('Success!','New post is created');
      } else {
          Alert::warning('Warning!','Something wrong ! Please check all field');
      	}

      return redirect('/blog');
    }

	public function getSingle($post_slug)
	{

	  $blog = Blog::where('post_slug', $post_slug)->first();
	  $blog_id = $blog->id;
	  $comments = Blog::find($blog_id)->comments;
	  $numberOfComments = count($comments);
	  
	 $poll = Poll::firstWhere('isActive',1);
	
	 $options = $poll->option_polls;
      return view ('blog.blog', compact('blog','comments', 'numberOfComments', 'poll', 'options'));
 	}

    public function delete($id)
    {
		$blog = Blog::where('id', $id)->firstOrFail();
		
		$oldImage = $blog->image;
		$delete = Blog::where('id', $id)->delete();
		$blog->comments()->delete();

		$imageDeleted = unlink('images/'.$oldImage);
 		
		if(($delete) AND ($imageDeleted)) {
			Alert::success('Success', 'Blog was deleted');
		} else {
			Alert::error('Error', 'Something wrong ! Try Again.');
		}
		return redirect('/home');
	}
	
	public function edit($post_slug)
	{
		$blog = Blog::where('post_slug', $post_slug)->first();
		$blog_id = $blog->id;
		
		$categorys = Category::all();
		$tags = Blog::find($blog_id)->tags;

		return view('blog.edit_blog', compact('blog','categorys','tags'));
	}

	public function update($slug)
	{
		$blog = Blog::where('post_slug', $slug)->firstOrFail();
		
		request()->validate([
			'post_title' => 'required',
			'published' => 'required',
			'post_subtitle' => 'required',
			'post_category' => 'required',
			'post_tag' => 'required',
			'body' => 'required'
		]);
		
		$blog->title = request()->post_title;
		$blog->subtitle = request()->post_subtitle;
		$blog->published = request()->published;
		$blog->user_id = request()->user()->id;
		$blog->body = request()->body;
		
		if(request()->hasFile('post_image')) {	
			//add new image
			$image = request()->file('post_image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$location =  public_path('images/' . $filename);
			Image::make($image)->resize(1280, 350)->save($location);
			$oldImage = $blog->image;
			//update database
			$blog->image = $filename;
			//delete old image
			Storage::delete($oldImage);
		}
		$blog->category()->associate(request('post_category'));

		if($blog->save()) {
			$blog->tags()->sync(request('post_tag'));

			Alert::success('Success', 'Blog updated');
		} else {
			Alert::error('Error', 'Somethnig wrong !');
		}
		return redirect('/blog');
	}

	public function blogComments($id)
	{
		$blog = Blog::find($id);
		$comments = $blog->comments;
		return view('blog.comments', compact('blog','comments'));
	}
	
	public function deleteAllComments($id)
	{
		$blog  = Blog::find($id);
		$deleteAllComments = $blog->comments()->delete();

		if($deleteAllComments){
			Alert::success('Success', 'Comments successfully deleted');
		} else {
			Alert::warning('Warning', 'Something wrong !');
		}
		return redirect('/blog/' .$blog->id. '/comments');
	}

	public function deleteSingleComment($id)
	{
		$singleComment = Comment::find($id);
		$deleteSingleComment = $singleComment->delete();
		
		if($deleteSingleComment){
			Alert::success('Success', 'Comment deleted !');
		} else {
			Alert::warning('Warning', 'Try again !');
		}
		return redirect('/blog/' .$singleComment->blog->id. '/comments');
	}

	public function deleteSelectedComment($id)
	{
		request()->validate([
			'comment_id' => 'required',
		]);
		$selected = request()->comment_id;
		$deleteSelected = Comment::destroy($selected);

		if($deleteSelected){
			Alert::success('Success', 'Deleted !');
		}
		else {
			Alert::warning('Ooops','Try again !');
		}
		return redirect('blog/' .$id. '/comments');
	}

	public function myBlogs()
	{
		$user = auth()->user()->id;
		$blogs = Blog::where('user_id', $user)->get();
		
		return view('blog.my-blogs',compact('blogs'));
	}

	public function test()
	{
		dd("ovo je test");
	}
}

