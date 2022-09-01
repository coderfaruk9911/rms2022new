<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    
    public function view(){
        $allUser = User::all();
        return view('admin.pages.user_management.user_view',compact('allUser'));
    }


    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:191',
            'role' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->role = $request->role;
        $data->email  = $request->email;
        $data->password  = Hash::make($request->password);
        
        $result = $data->save();
        if ($result) {
            $notification = array(
                'messege' => 'New User Create Successfully',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }
    }

    public function edit($id){
        $editData = User::findOrFail($id);
        return view('admin.pages.user_management.edit_user', compact('editData'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|max:191',
            'role' => 'required',
        ]);

        $data = User::findOrFail($id);

        $data->name = $request->name;
        $data->role = $request->role;
        
        $result = $data->save();
        if ($result) {
            $notification = array(
                'messege' => 'Update Successfully',
                'alert-type' => 'success'
            );
        return redirect()->route('user_management.view')->with($notification);
        }  else{
            $notification = array(
                'messege' => 'Something Went Wrong ! Please Try Again',
                'alert-type' => 'error'
            );
        } 
    }

    public function delete($id){
        $result = User::findOrFail($id)->delete();
        if ($result) {
            $notification = array(
                'messege' => 'User Delete Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('user_management.view')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Something Went Wrong ! Please Try Again',
                'alert-type' => 'error'
            );
        }
       
    }

    public function AdminProfile($id){
        $adminInfo = User::findOrFail($id);
        return view('admin.pages.user_management.profile_view',compact('adminInfo'));
    }



}
