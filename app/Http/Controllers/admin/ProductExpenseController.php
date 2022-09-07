<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dailyproductexpense;

class ProductExpenseController extends Controller
{
    public function view(){
        $provideProductList = Dailyproductexpense::all();
        return view('admin.pages.dailyproductexpense.index',compact('provideProductList'));
    }

    public function addForm(){
        $provideProductList = Dailyproductexpense::all();
        return view('admin.pages.dailyproductexpense.add_form',compact('provideProductList'));
    }


    public function store(Request $request){
        $validated = $request->validate([
            // 'company_name' => 'required|unique:suppliers|max:191',
            // 'contact_person_name' => 'required|max:191',
            // 'contact_number' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:11',
        ]);

        $data = new Dailyproductexpense();
        $data->expense_date = $request->expense_date;
        $data->product_name = $request->product_name;
        $data->product_id = $request->product_id;
        $data->quantity = $request->quantity;
        $result = $data->save();
        if ($result) {
            $notification = array(
                'messege' => 'Dailyproductexpense Add Successfully',
                'alert-type' => 'success'
            );
        return redirect()->route('kitchen_product_provide.view')->with($notification);
        }
    }

    public function edit($id){
        $editData = Supplier::findOrFail($id);
        return view('admin.pages.supplier.edit', compact('editData'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'company_name' => 'required|max:191',
            'contact_person_name' => 'required|max:191',
            'contact_number' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:11',
        ]);

        $data = Supplier::findOrFail($id);

        $data->company_name = $request->company_name;
        $data->contact_person_name = $request->contact_person_name;
        $data->contact_number = $request->contact_number;
        $result = $data->save();
        if ($result) {
            $notification = array(
                'messege' => 'Supplier Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('supplier.view')->with($notification);
        }
        
    }

    public function delete($id){
        $result=Supplier::findOrFail($id)->delete();
        if ($result) {
            $notification = array(
                'messege' => 'Supplier Delete Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('supplier.view')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Something Went Wrong ! Please Try Again',
                'alert-type' => 'success'
            );
        }
       
    }
}
