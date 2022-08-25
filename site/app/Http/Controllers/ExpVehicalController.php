<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpVehical;

class ExpVehicalController extends Controller
{
     public function expvehicalshow(){
   // $stock=Avb_Inventory::all();
        $exp=ExpVehical::orderBy('created_at','desc')->get();
    return view('exp_vehical',compact('exp'));
   }
   public function expvehicalcreated(Request $request){
        $this->validate($request,[
            'motor_name'=>'required',
            'motor_no'=> 'required',
            'info'=> 'required',
            
            'date'=> 'required',
        ]);
        $expvehical=new ExpVehical();
        $expvehical->motor_name=$request['motor_name'];
        $expvehical->motor_no=$request['motor_no'];
        $expvehical->info=$request['info'];
        $expvehical->fuel=$request['fuel'];
        $expvehical->maint=$request['maint'];
   
        $expvehical->paper_work=$request['paper_work'];
        $expvehical->date=$request['date'];
         if($expvehical->save()){
                   return redirect()->back()->with('success',' ExpVehical Added successfully.'); 
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
   }
    public function search(Request $request){
        $exp=ExpVehical::where('motor_name','like','%'.$request['mobile'].'%')->get();
        return view('exp_vehical',compact('exp'));
   }
}
