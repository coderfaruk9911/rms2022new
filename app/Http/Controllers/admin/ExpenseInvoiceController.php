<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Stockproductlist;

class ExpenseInvoiceController extends Controller
{
    public function view(){
        $ExpenseList = Expense::all();
        return view('admin.pages.expense.index',compact('ExpenseList'));
    }


    public function store(Request $request){
        $validated = $request->validate([
            'invoice_date' => 'required',
            'product_name' => 'required|max:191',
            'total_amount' => 'required|numeric|digits_between:1,10',
            'paid_amount' => 'required|numeric|digits_between:1,10',
            'due_amount' => 'required|numeric|digits_between:1,10',
        ]);

        $data = new Expense();

        $lastInvoiceNumber = Expense::latest('invoice_number')->first();
        $lastInvoiceNumber == null ? $data->invoice_number  = '000001' : $data->invoice_number  = str_pad(($lastInvoiceNumber->invoice_number + 1),6, "0", STR_PAD_LEFT);

        $data->invoice_date = $request->invoice_date;
        $data->product_name = $request->product_name;
        $data->total_amount = $request->total_amount;
        $data->paid_amount = $request->paid_amount;
        $data->due_amount = $request->due_amount;
        $result = $data->save();

        $stock = new Stockproductlist();


        









        if ($result) {



            $exists = Stockproductlist::latest('product_id')->first();
        if($exists){
            $output ="data Alreasy Exists";
        }else{
            $lastId = Stockproductlist::latest('product_id')->first();
            $lastId == null ? $stock->product_id  = '100001' : $stock->product_id  = str_pad(($lastId->product_id + 1),6, "0", STR_PAD_LEFT);
            $stock->product_name = $request->product_name;
            $result2 = $stock->save();
        }






            $notification = array(
                'messege' => 'Invoice Add Successfully',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
        }
    }

    public function edit($id){
        $editData = Expense::findOrFail($id);
        return view('admin.pages.expense.edit', compact('editData'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'invoice_date' => 'required',
            'product_name' => 'required|max:191',
            'total_amount' => 'required|numeric|digits_between:1,10',
            'paid_amount' => 'required|numeric|digits_between:1,10',
            'due_amount' => 'required|numeric|digits_between:1,10',
        ]);

        $data = Expense::findOrFail($id);

        $data->invoice_date = $request->invoice_date;
        $data->product_name = $request->product_name;
        $data->total_amount = $request->total_amount;
        $data->paid_amount = $request->paid_amount;
        $data->due_amount = $request->due_amount;
        $result = $data->save();

        if ($result) {
            $notification = array(
                'messege' => 'Invoice Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('expense_invoice.view')->with($notification);
        }
        
    }

    public function delete($id){
        $result=Expense::findOrFail($id)->delete();
        if ($result) {
            $notification = array(
                'messege' => 'Expense Delete Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('expense_invoice.view')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Something Went Wrong ! Please Try Again',
                'alert-type' => 'success'
            );
        }
       
    }
}
