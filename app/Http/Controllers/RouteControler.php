<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use LaravelLocalization;
class RouteControler extends Controller
{

   public function get_offer(){
       $offer=Offer::select('id','name_'. LaravelLocalization::getCurrentLocale() . ' as name','price'
           ,'details_'.LaravelLocalization::getCurrentLocale() . ' as details')->get();
       return view('offers.show',compact('offer'));
//       return Offer::select('id','name','details')->get();// لو هحد عوميد محدده بستخدم select غير كده بستخدم get بس
   }
   public function set_offer(){

       Offer::create([

          'name'=>'cap',
          'price'=>5,
          'details'=> 'blake cap',
       ]);
   }
    public function add_offer(){

       return view('offers.add');
    }


    // data was sent in request so we shold creat an object form Request class
    // لازم اعمل use Illuminate\Http\Request;
    public function store_offer( OfferRequest $request){

       //validate data
//        $rules=$this->getrules();
//        $customMessages =$this->getmessege();

       // $validate=$this->validate($request,$rules,$customassege);
//        $validator=Validator::make($request->all(),$rules,$customMessages);
//        if ($validator->fails()){
//            return $validator->errors();
//            return redirect()->back()->withErrors($validator->customMessages)->withInput($request->all());

//        }
        Offer::create([
            'name_en'=>$request->name_en,
            'name_ar'=>$request->name_ar,
            'price'=>$request->price,
            'details_en'=> $request->details_en,
            'details_ar'=>$request->details_ar,
        ]);
        return redirect()->back()->with(['success'=>'تم اضافه العرض']);

    }
//    protected function getmessege(){
//       return $messages =[
//           'name.Required'=>_('message.offer name'),
//           'name.max:6'=>'اسم العرض يجب ان لا يتعدى 6 احرف',
//           'name.unique:offers,name'=>'اسم العرض يجب الأ يتكرر',
//           'price.Required'=>'سعر العرض مطلوب',
//           'price.Numeric'=>'سعر العرض يجب ان يكون رقم',
//           'details.Required'=>'تفاصيل العرض مطلوبه',
//
//
//       ];
//    }
//    protected function getrules(){
//        return  $rules=[
//
//              'name' => 'Required|max:6|unique:offers,name',
//            'price' => 'Numeric|Required',
//            'details' => 'Required',
//        ];
//    }
}

