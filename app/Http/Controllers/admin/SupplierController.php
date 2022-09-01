<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function view(){
        $SupplierList = Supplier::all();
        return view('admin.pages.supplier.index',compact('SupplierList'));
    }


    public function store(Request $request){
        $validated = $request->validate([
            'company_name' => 'required|unique:suppliers|max:191',
            'contact_person_name' => 'required|max:191',
            'contact_number' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:11',
        ]);

        $data = new Supplier();
        $data->company_name = $request->company_name;
        $data->contact_person_name = $request->contact_person_name;
        $data->contact_number = $request->contact_number;
        $result = $data->save();
        if ($result) {
            $notification = array(
                'messege' => 'Supplier Add Successfully',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
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
