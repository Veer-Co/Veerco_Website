<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('admin/add-category');
    }
    public function categoryList()
    {
        $cat_list = Category::paginate(10);
        return view('admin/category-list', compact('cat_list'));
    }

    public function categoryDelete(Request $req)
    {
        $req->validate([
            'category_id' => 'required',
        ]);

        $cat_del = Category::where('id', $req->category_id)->delete();
        if ($cat_del) {
            return redirect()->back()->with(session()->flash('success', 'Category successfully deleted.'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
        
    }

    public function categoryStore(Request $request)
    {
        $request->validate([
            'category' => ['required', 'string'],
            'category_img' => ['required','image','mimes:jpeg,png,jpg','max:200'],
        ]);
        
        try {
            if ($request->hasfile('category_img')) {
                $file = $request->file('category_img');
                $extenstion = $file->getClientOriginalExtension();
                $category_img = 'category_img-'.time().'.'.$extenstion;
                $file->move(public_path('uploads/category'), $category_img);
            
                $category = Category::create([
                    'category_slug' => $request->category,
                    'category' => $request->category,
                    'category_image' => $category_img,
                ]);
            } else {
                return redirect()->back()->with(session()->flash('error', 'Please! choose category image.'));
            }
        } catch (Exception $e) {
            // return  $e->getMessage();
            // $request->session()->put('error', $e->getMessage());
            return redirect()->back()->with(session()->flash('error', $e->getMessage()));
        }        

        if ($category) {
            return redirect()->back()->with(session()->flash('success', 'Category successfully inserted.'));
        } else{
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
        
    }


}
