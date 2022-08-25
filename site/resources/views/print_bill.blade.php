<!DOCTYPE html>
<html>
<style type="text/css">
	th, td {
    padding: 6px;
    text-align: center;
    padding-bottom: 0px;
    font-size: smaller;
}
/*th{
	border-top:2px solid black;
	border-bottom:2px solid black;
}*/
table {
    width: 100%;

}
</style>
<body>

<h5 style="float: right;margin: 0px">Date:{{ Carbon\Carbon::parse($bill->created_at)->format('d-m-Y ')}}</h5>
<h5 style="text-align: left;margin: 0px">Invoice No:{{$bill->bill_number}}</h5>
<h3 style="text-align: center;padding: 0px;margin: 0px;clear: both">{{@App\User::first()->value('name')}}</h3>
<h4 style="text-align: center;padding: 0px;margin: 0px">{{@App\User::first()->value('address')}}</h4>
<h4 style="text-align: center;padding: 0px;margin: 0px">{{@App\User::first()->value('mobile1')}} {{@App\User::first()->value('mobile2')}}</h4>
<h4 style="text-align: center;padding: 0px;margin: 0px"> {{@App\User::first()->value('description')}}</h4>

<h5 style="text-align: center;margin: 0px">Customer Name:<u>{{@App\Customer::where('id',$bill->cust_id)->value('name')}}</u></h5>

<h5 style="text-align: center;padding: 0px;margin: 0px">Customer Mobile:<u>{{@App\Customer::where('id',$bill->cust_id)->value('mobile_no')}}</u></h5>
<br>
	<table >
		<thead style="border: 2px solid black">
			<tr >
				<th>Sr.no</th>
			
			<th>Quantity</th>
			<th>Rate</th>
			<th>total</th>
			</tr>
			
		</thead>
		<tbody style="border: 2px solid black">
		
		<tr>
			<td>1</td>
			<td>{{$bill->quantity}}</td>
			<td>{{$bill->rate}}</td>
			<td>{{$bill->amount}}</td>
		</tr>
		<tr >
                  
                  <td><br></td>
                  <td><br></td>
                  <td><br></td>
                  <td><br></td>
                  
              
                  
                   
                </tr>
			  <tr >
                  
                  <td style="border-top: 1px solid black"></td>
                  <td style="border-top: 1px solid black"></td>
                 
                  <td style="border: 1px solid black">Paid:</td>
                  <td style="border: 1px solid black" >RS.{{$bill->payment}}</td>
              
                  
                   
                </tr>
                <tr >
                  
                  <td></td>
                  <td></td>
                  
                  <td style="border: 1px solid black">Balance:</td>
                  <td style="border: 1px solid black">RS.{{$bill->payment_balance}}</td>
              
                  
                   
                </tr>
                <tr >
                  
                  <td></td>
                  <td></td>
                  
                  <td style="border: 1px solid black">Balance Tray:</td>
                  <td style="border: 1px solid black">{{$bill->balance_t}}</td>
              
                  
                   
                </tr>
               
		</tbody>
	</table>
<br>
<p style="font-size: small;margin: 0px"><u>Declaration</u>We declare that this invoice shows the actual price of goods described and that all perticulars are true and correct.</p>
<p style="font-size: small;margin: 2px;text-align: center"><u>This is Computer Generated Invoice</u></p>
</body>

</html>