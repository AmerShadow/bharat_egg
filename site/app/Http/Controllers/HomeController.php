<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Seller;
use App\StockIn;
use App\AvbStock;
use App\StockOut;
use App\BillNumber;
use App\RecNumber;
use PDF;
use App\Damage;
use App\PayRec;
use App\ExpVehical;
use App\ExpLabour;
use App\ExpExtra;
use App\User;

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
        $cust = Customer::orderBy('created_at', 'desc')->get();
        $seller = Seller::orderBy('created_at', 'desc')->get();
        return view('home', compact('cust', 'seller'));
    }
    public function createcustomer(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobileno' => 'required',
            'address' => 'required',

        ]);
        $customer = new Customer();
        $customer->name = $request['name'];
        $customer->mobile_no = $request['mobileno'];
        $customer->address = $request['address'];

        $customer->save();
        return redirect()->back();
    }
    public function createseller(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobileno' => 'required',
            'address' => 'required',

        ]);
        $customer = new Seller();
        $customer->name = $request['name'];
        $customer->mobile_no = $request['mobileno'];
        $customer->address = $request['address'];
        $customer->save();
        return redirect()->back();
    }
    public function stockshow($id)
    {
        $stock = StockIn::orderBy('created_at', 'desc')->get();
        return view('stock', compact('id', 'stock'));
    }

    public function stockcreated(Request $request)
    {
        $this->validate($request, [
            'rate' => 'required',
            'amount' => 'required',
            'quantity' => 'required',
            'payment' => 'required',
            'payment_balance' => 'required',
            'balance_t' => 'required',
            'date' => 'required',
        ]);
        $stock = new StockIn();
        $stock->rate = $request['rate'];
        $stock->amount = $request['amount'];
        $stock->quantity = $request['quantity'];
        $stock->payment = $request['payment'];
        $stock->payment_balance = $request['payment_balance'];
        $stock->balance_t = $request['balance_t'];
        $stock->date = $request['date'];
        if ($stock->save()) {
            $avbstock = AvbStock::first();
            $avbstock->quantity = $avbstock->quantity + $request['quantity'];
            $avbstock->update();
            return redirect()->back()->with('success', ' AvbStock Added successfully.');
        } else {
            return redirect()->back()->with('unsuccess', 'Failed try again.');
        }
    }

    public function stock_outshow($id)
    {
        $avbStock = AvbStock::first();
        if (!empty($avbStock) && $avbStock->value('quantity') == 0) {
            return redirect()->back()->with('unsuccess', 'No Eggs in stock');
        } else {
            $stock = StockOut::orderBy('created_at', 'desc')->where('cust_id', $id)->get();
            $billNumber = BillNumber::first();
            return view('stock_out', compact('id', 'stock', 'billNumber'));
        }
    }


    public function stock_outcreated(Request $request, $id)
    {
        $this->validate($request, [
            'cust_id' => 'required',
            'rate' => 'required',
            'p_rate' => 'required',
            'amount' => 'required',
            'quantity' => 'required',
            'payment' => 'required',
            'payment_balance' => 'required',
            'empty_t' => 'required',
            'balance_t' => 'required',
            'date' => 'required',
        ]);
        $stock = new StockOut();
        $stock->cust_id = $id;
        $stock->rate = $request['rate'];
        $stock->p_rate = $request['p_rate'];
        $stock->bill_number = Billnumber::first()->value('number');
        $stock->amount = $request['amount'];
        $stock->quantity = $request['quantity'];
        $stock->payment = $request['payment'];
        $stock->payment_balance = $request['payment_balance'];
        $stock->empty_t = 2;
        $stock->deposit_t = $request['empty_t'];
        $stock->balance_t = $request['balance_t'];
        $stock->bill_type = 'P';
        $stock->date = $request['date'];
        if ($stock->save()) {
            $avbstock = AvbStock::first();
            $avbstock->quantity = $avbstock->quantity - $request['quantity'];
            $avbstock->update();
            $bill = BillNumber::first();
            $bill->number = $bill->number + 1;
            if ($bill->update()) {
                return redirect()->back()->with('success', ' StockOut Added successfully.');
            } else {
                return redirect()->back()->with('unsuccess', 'Failed try again.');
            }
        } else {
            return redirect()->back()->with('unsuccess', 'Failed try again.');
        }
    }

    public function print_bill($id)
    {
        $bill = StockOut::where('id', $id)->first();
        $pdf = PDF::loadView('print_bill', compact('bill'));
        return $pdf->stream($bill->bill_number . ".pdf", array("Attachment" => false));
    }

    public function print_rec($id)
    {
        $bill = StockOut::where('id', $id)->first();
        $pdf = PDF::loadView('print_recipt', compact('bill'));
        return $pdf->stream($bill->bill_number . ".pdf", array("Attachment" => false));
    }

    public function damage(Request $request)
    {
        $this->validate($request, [
            'rate' => 'required',
            'quantity' => 'required',
            'date' => 'required',

        ]);
        $damage = new Damage();
        $damage->quantity = $request['quantity'];
        $damage->rate = $request['rate'];
        $damage->total = $request['rate'] * $request['quantity'];
        $damage->date = $request['date'];
        if ($damage->save()) {
            $avbstock = AvbStock::first();
            $avbstock->quantity = $avbstock->quantity - $request['quantity'];
            if ($avbstock->update()) {
                return redirect()->back()->with('success', ' StockOut Added successfully.');
            } else {
                return redirect()->back()->with('unsuccess', 'Failed try again.');
            }
        } else {
            return redirect()->back()->with('unsuccess', 'Failed try again.');
        }
    }
    public function rec_show($id)
    {
        $stock = StockOut::where('cust_id', $id)->orderBy('date', 'desc')->get();
        return view('reciept', compact('stock', 'id'));
    }

    public function recipt(Request $request)
    {
        $this->validate($request, [
            'payment' => 'required',
            'empty_t' => 'required',
            'date' => 'required',
        ]);
        $stock = new StockOut();
        $stock->bill_type = 'R';
        $stock->bill_number = RecNumber::first()->value('number');
        $stock->cust_id = $request['cust_id'];
        $stock->payment = $request['payment'];
        $stock->date = $request['date'];
        $stock->deposit_t = $request['empty_t'];

        if ($stock->save()) {
            $rec = RecNumber::first();
            $rec->number = $rec->number + 1;
            $rec->update();
            return redirect()->back()->with('success', ' StockOut Added successfully.');
        } else {
            return redirect()->back()->with('unsuccess', 'Failed try again.');
        }
    }

    public function sale_det()
    {
        if (AvbStock::first()->value('quantity') == 0) {
            return redirect()->back();
        } else {
            $stock = StockOut::orderBy('created_at', 'desc')->get();
            return view('sale_det', compact('stock'));
        }
    }
    public function damaged()
    {
        $stock = Damage::orderBy('created_at', 'desc')->get();
        return view('damage', compact('stock'));
    }
    public function balance_sheet()
    {
        $stock = StockIn::all();
        $st_out = StockOut::all();

        $purchase = $stock->groupBy('date')->map(function ($row) {
            return $row->sum('amount');
        });
        $sold = $st_out->groupBy('date')->map(function ($row) {
            return $row->sum('amount');
        });
        $deposit = $st_out->groupBy('date')->map(function ($row) {
            return $row->sum('payment');
        });

        $sumVahicleExpences = ExpVehical::sumAmount();
        $sumLabourExpences = ExpLabour::sum('payment');
        $sumExtraExpences = ExpExtra::sum('amount');
        return view('balance_sheet',
                    compact('purchase', 'sold', 'deposit', 'sumVahicleExpences', 'sumLabourExpences', 'sumExtraExpences'));
    }

    public function search_bs(Request $request)
    {
        $stock = StockIn::WhereBetween('date', [$request['date_from'], $request['date_to']])->orderBy('date', 'desc')->get();
        $st_out = StockOut::WhereBetween('date', [$request['date_from'], $request['date_to']])->orderBy('date', 'desc')->get();

        $purchase = $stock->groupBy('date')->map(function ($row) {
            return $row->sum('amount');
        });
        $sold = $st_out->groupBy('date')->map(function ($row) {
            return $row->sum('amount');
        });
        $deposit = $st_out->groupBy('date')->map(function ($row) {
            return $row->sum('payment');
        });

        $sumVahicleExpences = ExpVehical::sumAmount();
        $sumLabourExpences = ExpLabour::WhereBetween('date', [$request['date_from'], $request['date_to']])->orderBy('date', 'desc')->sum('payment');
        $sumExtraExpences = ExpExtra::WhereBetween('date', [$request['date_from'], $request['date_to']])->orderBy('date', 'desc')->sum('amount');

        return view('balance_sheet', compact('purchase', 'sold', 'deposit', 'sumVahicleExpences', 'sumLabourExpences', 'sumExtraExpences'));
    }

    public function search_s(Request $request)
    {
        $stock = StockOut::WhereBetween('date', [$request['date_from'], $request['date_to']])->orderBy('date', 'desc')->get();
        return view('sale_det', compact('stock'));
    }
    public function search_c(Request $request, $id)
    {
        $stock = StockOut::WhereBetween('date', [$request['date_from'], $request['date_to']])->where('cust_id', $id)->orderBy('date', 'desc')->get();
        return view('stock_out', compact('id', 'stock'));
    }
    public function profile()
    {
        $user = User::first();
        return view('profile', compact('user'));
    }
    public function profile_post(Request $request)
    {
        $user = User::first();
        $user->name = $request['name'];
        $user->mobile1 = $request['mobile1'];
        $user->mobile2 = $request['mobile2'];
        $user->address = $request['address'];
        $user->description = $request['description'];
        if ($user->update()) {

            return view('profile', compact('user'));
        } else {
            return redirect()->back();
        }
    }
}
