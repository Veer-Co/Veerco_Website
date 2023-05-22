<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand()
    {
        return view('admin.add-brand');
    }
    public function brandList()
    {
        $brands = Brand::paginate(15);
        return view('admin.brand-list', compact('brands'));
    }
    public function brandAdd(Request $request)
    {
        $request->validate([
            'brand' => ['required'],
            'brand_img' => ['required', 'image', 'mimes:png,jpg', 'max:300'],
        ]);

        try {
            if ($request->hasfile('brand_img')) {
                $file = $request->file('brand_img');
                $extenstion = $file->getClientOriginalExtension();
                $brand_img = 'brand_img-'.time().'.'.$extenstion;
                $file->move(public_path('uploads/brand'), $brand_img);
            
                $brand = Brand::create([
                    'brand_slug' => $request->brand,
                    'brand' => $request->brand,
                    'brand_image' => $brand_img,
                ]);
            } else {
                return redirect()->back()->with(session()->flash('error', 'Please! choose brand image.'));
            }
        } catch (Exception $e) {
            // return  $e->getMessage();
            // $request->session()->put('error', $e->getMessage());
            return redirect()->back()->with(session()->flash('error', $e->getMessage()));
        }        

        if ($brand) {
            return redirect()->back()->with(session()->flash('success', 'Brand successfully inserted.'));
        } else{
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
    }

    public function brandDelete(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
        ]);

        $brand_del = Brand::where('id', $request->brand_id)->delete();
        if ($brand_del) {
            return redirect()->back()->with(session()->flash('success', 'Brand successfully deleted.'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }
    }
}
