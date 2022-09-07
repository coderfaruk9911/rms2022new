<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productlimit;
use App\Models\Stockproductlist;

class ProductLimitController extends Controller
{
    public function view(){
        $StockProduct = Stockproductlist::all();
        $Productlimits = Productlimit::join('stockproductlists', 'stockproductlists.id', '=', 'productlimits.product_id')
        ->select('productlimits.*', 'stockproductlists.product_name')
        ->get();
        return view('admin.pages.product_limit.index',compact('Productlimits','StockProduct'));
    }


    public function store(Request $request){
        $validated = $request->validate([
            'product_id' => 'required|unique:productlimits',
            'limit' => 'required|numeric',
        ]);

        $data = new Productlimit();
        $data->product_id = $request->product_id;
        $data->limit = $request->limit;
        $result = $data->save();
        if ($result) {
            $notification = array(
                'messege' => 'Productlimit Added Successfully',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }
    }

    public function edit($id){
        $editData = Productlimit::join('stockproductlists', 'stockproductlists.id', '=', 'productlimits.product_id')
        ->select('productlimits.*', 'stockproductlists.product_name')->findOrFail($id);
        return view('admin.pages.product_limit.edit', compact('editData'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'product_id' => 'required',
            'limit' => 'required|numeric',
        ]);

        $data = Productlimit::findOrFail($id);

        $data->product_id = $request->product_id;
        $data->limit = $request->limit;
        $result = $data->save();
        if ($result) {
            $notification = array(
                'messege' => 'Productlimit Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('product_limit.view')->with($notification);
        }
        
    }

    public function delete($id){
        $result = Productlimit::findOrFail($id)->delete();
        if ($result) {
            $notification = array(
                'messege' => 'Productlimit Delete Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('product_limit.view')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Something Went Wrong ! Please Try Again',
                'alert-type' => 'success'
            );
        }
       
    }
}
