<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Stockproductlist;
use App\Models\Expensedetails;

class ExpenseInvoiceController extends Controller
{
    public function view(){
        $ExpenseList = Expense::all();
        return view('admin.pages.expense.index',compact('ExpenseList'));
    }

    public function addForm(){
        $lastInvoiceNumber = Expense::latest('invoice_number')->first();
        if($lastInvoiceNumber==null){
            $invoice_number = '000001';
        }else{
            $invoice_number = str_pad(($lastInvoiceNumber->invoice_number + 1),6, "0", STR_PAD_LEFT);
        }
        return view('admin.pages.expense.add_form',compact('invoice_number'));
    }


    public function store(Request $request){
        $validated = $request->validate([
            'invoice_number' => 'required|unique:expenses',
            'invoice_date' => 'required',
            'total_amount' => 'required|numeric|digits_between:1,10',
            'paid_amount' => 'required|numeric|digits_between:1,10',
            'due_amount' => 'required|numeric|digits_between:1,10',


            'product_name' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
            'unit' => 'required',
            'price' => 'required',



        ]);

        $data = new Expense();

        $data->invoice_number = $request->invoice_number;
        $data->invoice_date = $request->invoice_date;
        $data->total_amount = $request->total_amount;
        $data->paid_amount = $request->paid_amount;
        $data->due_amount = $request->due_amount;
        $result = $data->save();



        


        // $stock = new Stockproductlist();
        // $stock->product_name = $request->product_name;
        // $stock->save();
        // $test= $stock->product_name = $request->product_name;
        // // $stock->save();
        // Stockproductlist::insert($test[]);


        // foreach ($request->product_name as $key=>$product) {
        //     $saveData = [
        //         'product_name' => $request->product_name[$key],
        //     ];
        //     DB::table('prod_com')->insert($saveData);
        // }


        if ($result) {
            foreach ($request->product_name as $key=>$product_name) {
            
                $eDetails = new Expensedetails();
                $eDetails->quantity = $request->quantity[$key];
                $eDetails->unit_price = $request->unit_price[$key];
                $eDetails->unit = $request->unit[$key];
                $eDetails->price = $request->price[$key];
                $done=$eDetails->save(); 
            }

            foreach ($request->product_name as $key=>$product_name) {
            
                $pName = new Stockproductlist();
                $pName->product_name = $request->product_name[$key];
                $done=$pName->save(); 
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
