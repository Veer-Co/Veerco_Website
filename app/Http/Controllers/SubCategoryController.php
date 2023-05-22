<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Exception;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function addSubCategory()
    {
        $categories = Category::get();
        return view('admin.add-subcategory', compact('categories'));
    }

    public function postSubcategory(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'subcategory' => 'required|string',
            'subcategory_img' => 'required|max:300|mimes:png,jpg|image',
        ]);

        try {
            if ($request->hasfile('subcategory_img')) {
                $file = $request->file('subcategory_img');
                $extenstion = $file->getClientOriginalExtension();
                $subcategory_img = 'subcategory_img-'.time().'.'.$extenstion;
                $file->move(public_path('uploads/subcategory'), $subcategory_img);
            
                $subcategory = Subcategory::create([
                    'subcategory_slug' => $request->subcategory,
                    'subcategory' => $request->subcategory,
                    'category_slug' => $request->category,
                    'subcategory_image' => $subcategory_img,
                ]);
            } else {
                return redirect()->back()->with(session()->flash('error', 'Please! choose subcategory image.'));
            }
        } catch (Exception $e) {
            // return  $e->getMessage();
            // $request->session()->put('error', $e->getMessage());
            return redirect()->back()->with(session()->flash('error', $e->getMessage()));
        }        

        if ($subcategory) {
            return redirect()->back()->with(session()->flash('success', 'Subcategory successfully inserted.'));
        } else{
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
    }

    public function subCategoryList()
    {
        $subcat_list = Subcategory::paginate(10);
        return view('admin.subcategory-list', compact('subcat_list'));
    }

    public static function getCategoryName($cid){
        $category = Category::where('category_slug', $cid)->first();
        $category = $category->category;
        return $category;
    }

    public function subCategoryDelete(Request $req)
    {
        $req->validate([
            'subcategory_id' => 'required',
        ]);

        $subcat_del = Subcategory::where('id', $req->subcategory_id)->delete();
        if ($subcat_del) {
            return redirect()->back()->with(session()->flash('success', 'Subcategory successfully deleted.'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
        
    }
}
