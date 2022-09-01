<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Previouscustomer;
use Artisan;

class Testcontroller extends Controller
{
    function PriviousMonth(){
        // $current = Carbon::now()->startOfMonth();
        // dd($current->format('F'));
        // $previousMonths = [];


        // $currentDate = Carbon::now()->startOfMonth();
        // while ($currentDate->year == Carbon::now()->year) {
        // $previousMonths[] = $currentDate->format('F');
        // $currentDate->subMonth();
        // } 
        // if (in_array('February', $previousMonths)){
        //     dd('ok');
        // }



        

        // $onlyDueCustomer= Previouscustomer:: where("Jan",'!=',1)->where("Jan",'!=','inActive')
        // ->orWhere("Feb",'!=',1)->where("Feb",'!=','inActive')
        // ->orWhere("Mar",'!=',1)->where("Mar",'!=','inActive')
        // ->orWhere("Apr",'!=',1)->where("Apr",'!=','inActive')
        // ->orWhere("May",'!=',1)->where("May",'!=','inActive')
        // ->orWhere("Jun",'!=',1)->where("Jun",'!=','inActive')
        // ->orWhere("Jul",'!=',1)->where("Jul",'!=','inActive')
        // ->orWhere("Aug",'!=',1)->where("Aug",'!=','inActive')
        // ->orWhere("Sept",'!=',1)->where("Sept",'!=','inActive')
        // ->orWhere("Oct",'!=',1)->where("Oct",'!=','inActive')
        // ->orWhere("Nov",'!=',1)->where("Nov",'!=','inActive')
        // ->orWhere("Dec",'!=',1)->where("Dec",'!=','inActive')
        // ->get();


        // ->where("May",'!=',1)->where("Jun",'!=',1)->where("Jul",'!=',1)->where("Aug",'!=',1)
        // ->where("Sept",'!=',1)->where("Oct",'!=',1)->where("Nov",'!=',1)->where("Dec",'!=',1)
        
        // ->where("Jan",'!=','inActive')->where("Feb",'!=','inActive')->where("Mar",'!=','inActive')
        // ->where("May",'!=','inActive')->where("Jun",'!=','inActive')->where("Jul",'!=','inActive')
        // ->where("Aug",'!=','inActive')->where("Sept",'!=','inActive')->where("Oct",'!=','inActive')
        // ->where("Nov",'!=','inActive')->where("Dec",'!=','inActive')
        // ->get();

        // dd($onlyDueCustomer);

        // foreach($onlyDueCustomer as $row){
        //     echo $row->name."<br>\n";
        // }


        Artisan::call('backup:run');
dd(Artisan::output());


        
        // return view('test.previous_month');
    }
}
