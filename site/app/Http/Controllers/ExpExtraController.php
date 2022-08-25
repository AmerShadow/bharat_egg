<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpExtra;


class ExpExtraController extends Controller
{
    public function expextrashow(){
   // $stock=Avb_Inventory::all();
      $exp=ExpExtra::orderBy('created_at','desc')->get();
    return view('exp_extra',compact('exp'));
   }
   public function expextracreated(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'amount'=> 'required',   
            'date'=> 'required',
        ]);
        $expextra=new ExpExtra();
        $expextra->name=$request['name'];
        $expextra->amount=$request['amount'];
        $expextra->date=$request['date'];
         if($expextra->save()){
                   return redirect()->back()->with('success',' ExpExtra Added successfully.'); 
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
   }
}
