<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Dotenv\Validator;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function create(){
        return view('offers.create');
    }

    public function store(Request $request){
        $rules=[
            'name_ar'=>'required|max:30|unique:offers,name_ar',
            'name_en'=>'required|max:30|unique:offers,name_en',
            'price'=>'required|numeric',
            'details_ar'=>'required|max:100',
            'details_en'=>'required|max:100',
        ];
        $messages=[
            'name.required'=>trans('offers.name required'),
            'name.max'=>trans('offers.name max'),
            'name.unique'=>trans('offers.name unique'),
            'price.required'=>trans('offers.price required'),
            'price.numeric'=>trans('offers.price numeric'),
            'details.required'=>trans('offers.details required'),
            'details.max'=>trans('offers.details max'),
        ];
        $validator=\Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
      Offer::create([
         'name_ar'=>$request->name_ar,
          'name_en'=>$request->name_en,
         'price'=>$request->price,
         'details_ar'=>$request->details_ar,
          'details_en'=>$request->details_en,
      ]);
        return redirect()->back()->with(['success'=>'تم اضافه العرض بنجاح']);
    }

    public function show(){
      $offers=Offer::all();
      return view('offers.show',compact('offers'));
    }
}
