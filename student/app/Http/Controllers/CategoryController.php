<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Providers\View;
use Illuminate\Support\Str;

use App\Category;
use App\Blog;
use DB;

use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(){
        
        $categorys = Category::all();
        return view('blog.category.category',compact('categorys'));
    }
    
    public function store()
    {
       
        $messages = [
            'name.required' => 'Name cannot be empty',
            'slug.required' => 'Slug name cannot be empty',
        ];
        
        $validate_categorie = request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ], $messages);

        if($validate_categorie){
          if(request('default')){
            $this->setNoDefault();

            $category = Category::create([
              'name' => request('name'),
              'slug' => Str::slug(request('slug'), '-'),
              'default' => 'yes'
          ]); 
            toast('New Category created', 'success');
          } else {
            $category = Category::create([
              'name' => request('name'),
              'slug' => Str::slug(request('slug'), '-')
            ]); 

            Alert::success('Succes!','Category created');
          }
        } else {
          Alert::warning('Oops', 'Please check all fields !');
        }

        return redirect('/category');
    }
    
    public function delete($id)
    {
        $category = Category::find($id);
        
        
       if($category->default == 'yes'){
          Alert::warning('Warning !','You delete default category! Please first set new default category, then delete !');
        } else {
            $this->blogsToDefaultCategory($category,$id);
            
            $delete = $category->delete();
            if($delete){
            Alert::success('Success', 'Successfully deleted');
        } else {
            Alert::error('Error','Something wrong');
        }
      }
      return redirect('/category');
    }

    public function editCategory(Category $category)
    {
        return view('blog.category.edit_category', compact('category'));
    }

    public function updateCategory(Category $category)
    {
        $messages = [
            'name.required' => 'Name cannot be empty',
            'slug.required' => 'Slug name cannot be empty',
            
        ];
        $update_category = $category->update(request()->validate([
            'name' => 'required',
            'slug' => 'required'
        ]), $messages);

        if($update_category)
        {
            Alert::success('Success', 'Data updated');
        }
        else {
            Alert::error('Error', 'Something wrong ! Try again');
        }

        return redirect('/category/'.$category->id. '/edit');
    }

    public function setDefault($id)
    {
        $category = Category::where('default','yes')->first();
        if($category->id == $id){
            Alert::warning('Warning', 'Vec je postavljen za default !');
        } 
        if ($category->id != $id && $category->default == 'yes') {
              $category->default = null;
              $category->save();

              $categoryDefault = Category::find($id);
              $categoryDefault->default = 'yes';

                if($categoryDefault->save()){
                    Alert::success('Success', 'Category is set to default');
                }
        }
        return redirect('/category');
    }

    public function setNoDefault(){
      $category = Category::where('default', 'yes')->first();
      $category->default = null;
      $category->save();
    }

    public function blogsToDefaultCategory($category,$id){
      $defaultCategory = Category::where('default','yes')->first();
      $defaultCategory = $defaultCategory->id;
      
      $update = $category->blogs()->update(['category_id' => $defaultCategory]);
    }

}
