<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Offer;
use App\Models\Order;

class HomeController extends Controller
{
    public function index(){
       /* $time=$this->time();
        $arrDate=collect($time);
        //===============for orders Chart==============
        $absenceChart=[];


            foreach (Offer::all() as $class) {
                $a=[];
                foreach ($time as $key) {

                    $ab = Order::where('offer_id', $class->id)
                        ->where('date', $key)
                        ->get();
                    $a[]  =count($ab);

                }

                $absenceChart[$class->name]= $a;
            }

//        dd($absenceChart);

        $absenceChart=collect($absenceChart);*/
        return view('admin.home');

    }
    public function time(){
        $start=new Carbon();
        $end=Carbon::now();
        $first=$start->firstOfMonth()->format('Y-m-d');
        $end=$end->format('Y-m-d');

        $ar=[];
        while ($first!=$end) {

            $ar[]=$first;
            $first=Carbon::parse($first)->addDay()->format('Y-m-d');
        }
        $ar[]=$end;
        return $ar;
    }
}
