<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpLabour;

class ExpLabourController extends Controller
{
    public function explabourshow(){
   // $stock=Avb_Inventory::all();
        $exp=ExpLabour::orderBy('created_at','desc')->get();
    return view('exp_labour',compact('exp'));
   }
   public function explabourcreated(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'address'=> 'required',
            'mobileno'=> 'required',
             
            'date'=> 'required',
        ]);
        $explabour=new ExpLabour();
        $explabour->name=$request['name'];
        $explabour->address=$request['address'];
        $explabour->mobileno=$request['mobileno'];
        $explabour->payment=$request['payment'];
        $explabour->advance=$request['advance'];
        $explabour->balance=$request['balance'];
        $explabour->date=$request['date'];
         if($explabour->save()){
                   return redirect()->back()->with('success',' ExpLabour Added successfully.'); 
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
   }
   public function search(Request $request){
        $exp=ExpLabour::where('name','like','%'.$request['mobile'].'%')->get();
        return view('exp_labour',compact('exp'));
   }
   public function editshow($id){
        $user=ExpLabour::where('id',$id)->first();
        return view('editlabour',compact('user'));
   }
   public function explabourupdate(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'address'=> 'required',
            'mobileno'=> 'required',
             
            'date'=> 'required',
        ]);
        $explabour=ExpLabour::where('id',$id)->first();
        $explabour->name=$request['name'];
        $explabour->address=$request['address'];
        $explabour->mobileno=$request['mobileno'];
        $explabour->payment=$request['payment'];
        $explabour->advance=$request['advance'];
        $explabour->balance=$request['balance'];
        $explabour->date=$request['date'];
         if($explabour->update()){
                   $exp=ExpLabour::orderBy('created_at','desc')->get();
                   return view('exp_labour',compact('exp')); 
                }
                else{
                     return redirect()->back()->with('unsuccess','Failed try again.');
                }
   }
}


