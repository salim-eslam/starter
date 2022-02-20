<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //
    protected $table = "offers"; // ده علشان لو انا مش مسمى اسم ال جدول فى الداتا بيز ذى ما لارافيل عاوز
    protected $fillable = ['id', 'name_ar','name_en', 'price', 'details_ar','details_en', 'created_at', 'updated_at'];//ديه ال data اللى هتخل فى داتا بيز
    protected $hidden = ['created_at', 'updated_a'];//ده مش هيرجع فى جمله ال select

//    لو عاوز اتحكم فى ادخال التاريخ/
//    public $timestamps =true;
//
}
