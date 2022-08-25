<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Question;
use App\Subject;
use Session;
use Excel;
use File;
use DB;
class AdminController extends Controller
{
    //
    public function index(){
    	return view('admin.home');
    } 
    public function add_paper(){
    	$test=Test::all();
    	return view('admin.addPaper',compact('test'));
    }
    public function subject(){
        $sub=Subject::all();
         return view('admin.subject',compact('sub'));
    }
    public function add_subject(Request $request){
        $this->validate($request,[
           'name' => 'required|string|max:255',
            
        ]);
        $sub=new Subject();
        $sub->name=$request['name'];
        if($sub->save()){
            return redirect()->back()->with('success','Subject Added Successfully');
        }
        else{
            return redirect()->back()->with('unsuccess','Failed Please Try Again');
        }
    }
    public function subject_del($id){
        if($get_std=Subject::where('id',$id)->delete()){

             return redirect()->back()->with('success','Subject Deleted Successfully');
        }
        else{
            return redirect()->back()->with('unsuccess','Failed Please Try Again');
        }
    }
    public function sub_paper(Request $request){
    	$this->validate($request,[
           'title' => 'required|string|max:255',
            'marks' => 'required',
            'no_qtn'=>'required',
            'duration'=>'required',
            
        ]);
        $test=new Test();
        $test->title=$request['title'];
        $test->marks=$request['marks'];
        $test->no_qtn=$request['no_qtn'];
        $test->duration=$request['duration'];
    
    if($test->save()){
            return redirect()->back()->with('success','Test Added Successfully');
        }
        else{
            return redirect()->back()->with('unsuccess','Failed Please Try Again');
        }
    }
    public function add_qtn($id){
    	return view('admin.addQuestions',compact('id'));
    }
    public function sub_qtn(Request $request){
    	$this->validate($request,[
           'sub' => 'required|string|max:255',
            'qtn' => 'required',
            'optn1'=>'required',
            'optn2'=>'required',
            'optn3'=>'required',
            'optn4'=>'required',
            'ans'=>'required',

            
        ]);
        $qtn=new Question();
        $qtn->test_id=$request['test_id'];
        $qtn->subject=$request['sub'];
        $qtn->qtn=$request['qtn'];
        $qtn->A=$request['optn1'];
        $qtn->B=$request['optn2'];
        $qtn->C=$request['optn3'];
        $qtn->D=$request['optn4'];
        $qtn->ans=$request['ans'];
        $qtn->type='T';
        $qtn->path='';
    
    if($qtn->save()){
            return redirect()->back()->with('success','question Added Successfully');
        }
        else{
            return redirect()->back()->with('unsuccess','Failed Please Try Again');
        }
    }
    public function del_qtn($id){

        if($get_std=Question::where('id',$id)->delete()){

             return redirect()->back()->with('success','Question Deleted Successfully');
        }
        else{
            return redirect()->back()->with('unsuccess','Failed Please Try Again');
        }
    
    }
    public function save($id){
    	$test=Test::where('id',$id)->first();
    	$test->status=1;

    
    if($test->update()){
            return redirect()->action('AdminController@add_paper')->with('success','Paper Added Successfully');
        }
        else{
            return redirect()->back()->with('unsuccess','Failed Please Try Again');
        }
    }

    public function import(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
 
                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();

                if(!empty($data) && $data->count()){
 
                    foreach ($data as $key => $row) {
                        foreach ($row as $key => $value){
                             $insert[] = [
                        'test_id' => $request->test_id,
                        'subject'=>$value->subject,
                        'qtn'=>$value->qtn,
                        'A'=>$value->a,
                        'B'=>$value->b,
                        'C'=>$value->c,
                        'D'=>$value->d,
                        'ans'=>$value->ans,
                        'type'=>'T',
                        'path'=>'',
                        ];
                        
                        }
                      
                        
                    }
 
                    if(!empty($insert)){
 
                        $insertData = DB::table('questions')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }

                    }
                }
 
                return back();
 
            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }
    public function imageUpload(Request $request)
    {
        $this->validate($request, [
            'subject'=>'required',
            'ans'=>'required',
            'image' => 'required|image|max:2048',
        ]);

        $qtn=new Question();
        $qtn->test_id=$request['test_id'];
        $qtn->subject=$request['subject'];
        $qtn->ans=$request['ans'];
        $qtn->type='I';
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/questions');
        $image->move($destinationPath, $name);
        $qtn->path=$name;
        if($qtn->save())
        {
          return back()->with('success','Image Upload successful');  
        }
        else
        {
            return back()->with('unsuccess','Image Upload Failed');
        }
        
    }

    public function show_paper($id){
        $qtn=Question::where('test_id',$id)->get();
        return view('admin.paper',compact('qtn','id'));
    }
}
