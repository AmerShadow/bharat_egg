<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpPersonal;

class ExpPersonalController extends Controller
{
    public function exppersonalshow(){
   // $stock=Avb_Inventory::all();
      $exp=ExpPersonal::orderBy('created_at','desc')->get();
    return view('exp_personal',compact('exp'));
   }
   public function exppersonalcreated(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'amount'=> 'required',   
            'date'=> 'required',
        ]);
        $expextra=new ExpPersonal();
        $expextra->name=$request['name'];
        $expextra->amount=$request['amount'];
        $expextra->date=$request['date'];
         if($expextra->save()){
                   return redirect()->back()->with('success',' ExpPersonal Added successfully.'); 
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
   }

}
