<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stockproductlist;

class StockProductListController extends Controller
{
    public function view(){
        $productlists = Stockproductlist::all();
        return view('admin.pages.stockproductlist.index',compact('productlists'));
    }


    public function store(Request $request){
        $validated = $request->validate([
            'product_name' => 'required|unique:stockproductlists|max:191',
        ]);

        $data = new Stockproductlist();
        $data->product_name = $request->product_name;
        $result = $data->save();
        if ($result) {
            $notification = array(
                'messege' => 'Stockproductlist Add Successfully',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }
    }

    public function edit($id){
        $editData = Stockproductlist::findOrFail($id);
        return view('admin.pages.stockproductlists.edit', compact('editData'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'product_name' => 'required|max:191',
        ]);

        $data = Stockproductlist::findOrFail($id);

        $data->product_name = $request->product_name;
        $result = $data->save();
        if ($result) {
            $notification = array(
                'messege' => 'Stockproductlist Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('Stockproductlist.view')->with($notification);
        }
        
    }

    public function delete($id){
        $result=Stockproductlist::findOrFail($id)->delete();
        if ($result) {
            $notification = array(
                'messege' => 'Stockproductlist Delete Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('stock_product_list.view')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Something Went Wrong ! Please Try Again',
                'alert-type' => 'success'
            );
        }
       
    }
}
