<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use DB;
use Illuminate\Support\Str;

use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('blog.tags.tag', compact('tags'));
    }

    public function store()
    {
        $validateTag = request()->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        if($validateTag)
        {
            $tags = Tag::create([
                'name' => request('name'),
                'slug' => Str::slug(request('slug'),'-')
            ]);

            Alert::success('Success', 'New Tag created');
        }
        else
        {
            Alert::error('Error', 'Something wrong ! Try again');

        }
        return redirect('/tag');
    }

    public function delete($id)
    {
        $delete = Tag::where('id', $id)->delete();

        if($delete)
        {
            Alert::success('Success', 'Successfully deleted !');

            return redirect('/tag');
        }
        else {
            return redirect('/tag');
        }
    }

    public function editTag(Tag $tag)
    {
        return view('blog.tags.edit_tag', compact('tag'));
    }

    public function updateTag(Tag $tag)
    {
        $updateTag = $tag->update(request()->validate([
            'name'=>'required',
            'slug'=>'required'
        ]));

        if($updateTag)
        {
            Alert::success('Success', 'Data updated');
        }
        else {
            Alert::error('Error', 'Something wrong ! Try again');
        }
        return redirect('/tag/'.$tag->id);
    }
}