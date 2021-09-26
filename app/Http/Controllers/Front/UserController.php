<?php

namespace App\Http\Controllers\Front;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ShowUserName(){
        return 'salimeslam';
    }
    public function getindex(){

        $obj=new \stdClass();
        $obj->name="ahmed";
        $obj->age=25;
        return view('welcome',compact('obj'));

//        return view('welcome')->with(['string'=>'salim eslam','age'=>'52']);
    }
}
