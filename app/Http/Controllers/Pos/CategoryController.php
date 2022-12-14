<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use Illuminate\Support\Carbon;
class CategoryController extends Controller
{
    public function CategoryAll(Request $request){
        $categories = Category::latest()->get();
        return view('backend.category.category_all',compact('categories'));
    }

    public function CategoryAdd(){
        $categories = Category::latest()->get();
        return view('backend.category.category_add',compact('categories'));
    }

    public function CategoryStore(Request $request){

        Category::insert([
            'name' => $request->name, 
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Category Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);

    }
    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }

    public function CategoryUpdate(Request $request){

        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'name' => $request->name, 
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Category Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);

    }

    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);

    }
}
