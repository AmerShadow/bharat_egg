<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyCredit;

class MyCreditController extends Controller
{
     public function my_creditshow(){
        $my=MyCredit::orderBy('created_at','desc')->get();
    return view('my_credit',compact('my'));
   }
   public function my_credit(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'amount'=> 'required',
            'diposit'=> 'required',
            'balance'=> 'required',
            'date'=> 'required',
        ]);
        $my=new MyCredit();
        $my->name=$request['name'];
        $my->amount=$request['amount'];
        $my->deposit=$request['diposit'];
        $my->balance=$request['balance'];
        $my->date=$request['date'];
         if($my->save()){
                   return redirect()->back()->with('success',' MyCredit Added successfully.');
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
   }
}
