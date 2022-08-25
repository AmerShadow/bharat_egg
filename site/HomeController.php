<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Category;
use App\Inventory;
use App\Credit;
use App\Sale;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function cust_show()
    {
        return view('form');
    }
    public function createcustomer(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'mobileno'=> 'required',
            'address'=> 'required',
            'shop_name'=> 'required',
        ]);
        $customer=new Customer();
        $customer->name=$request['name'];
        $customer->mobile_no=$request['mobileno'];
        $customer->address=$request['address'];
        $customer->shop_name=$request['shop_name'];
        $customer->save();
        return redirect()->back();
   }
   public function createcategory(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'description'=> 'required',
            'count'=> 'required',
            'quality'=> 'required',
        ]);
        $category=new Category();
        $category->name=$request['name'];
        $category->description=$request['description'];
        $category->count=$request['count'];
        $category->quality=$request['quality'];
        $category->save();
        return redirect()->back();
   }
   public function createinventory(Request $request){
        $this->validate($request,[
            'fruit_name'=>'required',
            'cate_id'=> 'required',
            'quantity'=> 'required',
            'p_price'=> 'required',
            'seller'=> 'required',
            'p_a'=> 'required',
            'p_b'=> 'required',
            'p_c'=> 'required',
            'end_limit'=> 'required',
            'p_date'=> 'required',
            'expense'=> 'required',
        ]);
        $inventory=new Inventory();
        $inventory->fruit_name=$request['fruit_name'];
        $inventory->cate_id=$request['cate_id'];
        $inventory->quantity=$request['quantity'];
        $inventory->p_price=$request['p_price'];
        $inventory->seller=$request['seller'];
        $inventory->p_a=$request['p_a'];
        $inventory->p_b=$request['p_b'];
        $inventory->p_c=$request['p_c'];
        $inventory->end_limit=$request['end_limit'];
        $inventory->p_date=$request['p_date'];
        $inventory->expense=$request['expense'];
        $inventory->save();
        return redirect()->back();
   }
   public function credit(Request $request){
        $this->validate($request,[
            'cust_id'=>'required',
            'inv_id'=> 'required',
            'quantity'=> 'required',
            'discount'=> 'required',
            'amount'=> 'required',
            'total'=> 'required',
            'debit'=> 'required',
            'credit'=> 'required',
            'closing_credit'=> 'required',
        ]);
        $credit=new Credit();
        $credit->cust_id=$request['cust_id'];
        $credit->inv_id=$request['inv_id'];
        $credit->quantity=$request['quantity'];
        $credit->discount=$request['discount'];
        $credit->amount=$request['amount'];
        $credit->total=$request['total'];
        $credit->debit=$request['debit'];
        $credit->credit=$request['credit'];
        $credit->closing_credit=$request['closing_credit'];
        $credit->save();
        return redirect()->back();
   }
   public function sell(Request $request){
        $this->validate($request,[
            'cust_id'=>'required',
            'inv_id'=> 'required',
            'quantity'=> 'required',
            'discount'=> 'required',
            'amount'=> 'required',
            'total'=> 'required',
            'pay_type'=> 'required',
        ]);
        $sale=new Sale();
        $sale->cust_id=$request['cust_id'];
        $sale->inv_id=$request['inv_id'];
        $sale->quantity=$request['quantity'];
        $sale->discount=$request['discount'];
        $sale->amount=$request['amount'];
        $sale->total=$request['total'];
        $sale->pay_type=$request['pay_type'];
        $sale->save();
        return redirect()->back();
   }
}
