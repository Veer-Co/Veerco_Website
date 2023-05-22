<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use App\Exports\ProductExport;

class BulkProduct extends Controller
{
    public function create(Request $request)
    {
        return view('admin.bulk.index');
    }

    public function fileExport() 
    {
        return Excel::download(new ProductExport, 'products-collection.xlsx');
    }  
    
    public function fileImport(Request $request) 
    {
        $imported = Excel::import(new ProductImport, $request->file('importProduct'));
        if ($imported) {
            return redirect()->back()->with(session()->flash('success', 'Product successfully imported.'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }        
    }
}
