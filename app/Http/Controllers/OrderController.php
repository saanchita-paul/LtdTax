<?php
namespace App\Http\Controllers;

use App\Library\SslCommerz\SslCommerzNotification;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use App\Models\Order;
use App\Models\District;
use App\Models\Division;
use App\Models\OrderDetails;
use App\Models\TrainOrderDetails;
use Cart;
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
	public function orderstatus($id,$i)
	{
		$data=array('status'=>$id);
		Order::where('id',$i)->update($data);
		return back()->with('success','Order status change successfully');
	}
	//training order
	public function trainOrederGenerate(Request $request){
		$request->validate([
			'payment' => 'required',
		]);
		$request->validate([
			'firstname' => 'required|max:255',
			'lastname' => 'required|max:255',
			'email' => 'required|email|max:255',
			'phone' => 'required|max:15|string',
			'country' => 'required',
			'division_id' => 'required|integer',
			'district_id' => 'required|integer',
			'zip' => 'required',
			'address1' => 'required',
		]);
		if ($request->checkbox == "on") {
			$request->validate([
				'ship_firstname' => 'required|max:255',
				'ship_lastname' => 'required|max:255',
				'ship_email' => 'required|email|max:255',
				'ship_phone' => 'required|max:15|string',
				'ship_country' => 'required',
				'ship_division_id' => 'required|integer',
				'ship_district_id' => 'required|integer',
				'ship_zip' => 'required',
				'ship_address1' => 'required',
			]);
		}
		if ($request->payment == 'cash'){
				$billing = BillingAddress::create(array(
					"firstname" => $request->firstname,
					"lastname" => $request->lastname,
					"email" => $request->email,
					"phone" => $request->phone,
					"country" => $request->country,
					"division_id" => $request->division_id,
					"district_id" => $request->district_id,
					"zip_code" => $request->zip,
					"address" => $request->address1,
				));
			if ($request->checkbox == "on") {
				$shipping = ShippingAddress::create(array(
					"firstname" => $request->ship_firstname,
					"lastname" => $request->ship_lastname,
					"email" => $request->ship_email,
					"phone" => $request->ship_phone,
					"country" => $request->ship_country,
					"division_id" => $request->ship_division_id,
					"district_id" => $request->ship_district_id,
					"shipping_note" => $request->shipping_note,
					"zip_code" => $request->ship_zip,
					"address" => $request->ship_address1,
					"shipping_note" => $request->ship_address1,
				));
			} else {
				$shipping = NULL;
			}
			// dd($request->all());
			$invoice = Order::orderBy('invoice_id', 'DESC')->first();
			if ($invoice != null) {
				$in = $invoice->invoice_id + 1;
			} else {
				$in = 1;
			}
			if ($shipping != null) {
				$ship = $shipping->id;
			} else {
				$ship = 0;
			}
			$sub = Cart::subtotal();
		$tot =(float)$sub;
	
		$t_final= $tot - $request->discount;
		$order = Order::create(array(
			'invoice_id' => $in,
			'payment_method' => $request->payment,
			'total' => $t_final,
			'discount'=>$request->discount,
			'shipping_id' => $ship,
			'billing_id' => $billing->id,
			'status' => 0,
			'order_type'=>1,
		));
		$content = Cart::content();
		$details = array();
		foreach ($content as $row) {
			$details['order_id'] = $order->id;
			$details['training_id'] = $row->id;
			$details['qty'] = $row->qty;
			$details['price'] = $row->price;
			$details['discount']= $row->qty * ($row->price - $row->options['sale_price']);
			$details['total'] = ($row->qty * $row->price) - $details['discount'];
			TrainOrderDetails::create($details);
		}
		$billing_address  = DB::table('billing_addresses')
		->select('billing_addresses.*','districts.name as district_name', 'divisions.name as division_name')
		->join('districts','districts.id','=','billing_addresses.district_id')
		->join('divisions','divisions.id','=','billing_addresses.division_id')
		->where('billing_addresses.status', 1)
		->where('billing_addresses.id',$order->billing_id)
		->first();
		\Mail::send('email/confirmOrderMail2', array(
			'order_id'  => $order->id,
			'invoice_id' => $order->invoice_id,
			'date' => $order->created_at,
			'payment_method' => $order->payment_method,
			'billing_address'=>$billing_address,
			'order'=>$order,
        ), function($message) use ($request){
            $message->from('a7604366@gmail.com','Taxman');
            $message->to($request->email)->subject('Order Details');
        });
		Cart::destroy();
		return redirect('/order/complete2')->with('complete2','complete2');
		}
		elseif($request->payment == 'ssl'){
			
			$billing = BillingAddress::create(array(
				"firstname" => $request->firstname,
				"lastname" => $request->lastname,
				"email" => $request->email,
				"phone" => $request->phone,
				"country" => $request->country,
				"division_id" => $request->division_id,
				"district_id" => $request->district_id,
				"zip_code" => $request->zip,
				"address" => $request->address1,
			));
			if ($request->checkbox == "on") {
				$shipping = ShippingAddress::create(array(
					"firstname" => $request->ship_firstname,
					"lastname" => $request->ship_lastname,
					"email" => $request->ship_email,
					"phone" => $request->ship_phone,
					"country" => $request->ship_country,
					"division_id" => $request->ship_division_id,
					"district_id" => $request->ship_district_id,
					"shipping_note" => $request->shipping_note,
					"zip_code" => $request->ship_zip_code,
					"address" => $request->ship_address,
				));
			} else {
				$shipping = NULL;
			}
			$invoice = Order::orderBy('invoice_id', 'DESC')->first();
			if ($invoice != null) {
				$in = $invoice->invoice_id + 1;
			} else {
				$in = 1;
			}
	
			if ($shipping != null) {
				$ship = $shipping->id;
			} else {
				$ship = 0;
			}
			$sub = Cart::subtotal();
			$tot =(float)$sub;
			$t_final= $tot - $request->discount;
			$post_data = array();
			$post_data['total_amount'] = $t_final; # You can't not pay less than 10
			$post_data['currency'] = "BDT";
			$post_data['tran_id'] = uniqid(); // tran_id must be unique
			# CUSTOMER INFORMATION
			$post_data['cus_name'] = 'Customer Name';
			$post_data['cus_email'] = 'customer@mail.com';
			$post_data['cus_add1'] = 'Customer Address';
			$post_data['cus_add2'] = "";
			$post_data['cus_city'] = "";
			$post_data['cus_state'] = "";
			$post_data['cus_postcode'] = "";
			$post_data['cus_country'] = "Bangladesh";
			$post_data['cus_phone'] = '8801XXXXXXXXX';
			$post_data['cus_fax'] = "";
			# SHIPMENT INFORMATION
			$post_data['ship_name'] = "Store Test";
			$post_data['ship_add1'] = "Dhaka";
			$post_data['ship_add2'] = "Dhaka";
			$post_data['ship_city'] = "Dhaka";
			$post_data['ship_state'] = "Dhaka";
			$post_data['ship_postcode'] = "1000";
			$post_data['ship_phone'] = "";
			$post_data['ship_country'] = "Bangladesh";
			$post_data['shipping_method'] = "NO";
			$post_data['product_name'] = "Computer";
			$post_data['product_category'] = "Goods";
			$post_data['product_profile'] = "physical-goods";
			# OPTIONAL PARAMETERS
			$post_data['value_a'] = "ref001";
			$post_data['value_b'] = "ref002";
			$post_data['value_c'] = "ref003";
			$post_data['value_d'] = "ref004";
			$order = Order::where('transaction_id', $post_data['tran_id'])->create(array(
				'invoice_id' => $in,
				'payment_method' => $request->payment,
				'total' => $t_final,
				'shipping_id' => $ship,
				'discount'=>$request->discount,
				'billing_id' => $billing->id,
				'status' => 0,
				'order_type'=>1,
				'transaction_id' => $post_data['tran_id'],
			));
			$content = Cart::content();
			$details = array();
			foreach ($content as $row) {
				$details['order_id'] = $order->id;
				$details['training_id'] = $row->id;
				$details['qty'] = $row->qty;
				$details['price'] = $row->price;
				$details['discount']= $row->qty * ($row->price - $row->options['sale_price']);
				$details['total'] = ($row->qty * $row->price) - $details['discount'];
				TrainOrderDetails::create($details);
			}
			// $email=$request->email;
			// $f_name = $request->firstname;
			// $o_id  = $order->id;
			// $total_f = $sub;
			// $r=	session(['email' => '$email']);
			// Session::put('f_name', $f_name);
			// Session::put('o_id', $o_id);
			// Session::put('total_f', $total_f);
			// Session::save();
			$sslc = new SslCommerzNotification();
			# initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
			$payment_options = $sslc->makePayment($post_data, 'hosted');
			if (!is_array($payment_options)) {
				print_r($payment_options);
				$payment_options = array();
			}
			Cart::destroy();
			return redirect('/order/complete2')->with('complete2','complete2');
		}
		else{
		return back()->with('error','payment method not found');
		}
	}
	// book order
	public function oredergenerate(Request $request)
	{	
		$request->validate([
			'payment' => 'required',
		]);
		$request->validate([
			'firstname' => 'required|max:255',
			'lastname' => 'required|max:255',
			'email' => 'required|email|max:255',
			'phone' => 'required|max:15|string',
			'country' => 'required',
			'division_id' => 'required|integer',
			'district_id' => 'required|integer',
			'zip' => 'required',
			'address1' => 'required',
		]);
		if ($request->checkbox == "on") {
			$request->validate([
				'ship_firstname' => 'required|max:255',
				'ship_lastname' => 'required|max:255',
				'ship_email' => 'required|email|max:255',
				'ship_phone' => 'required|max:15|string',
				'ship_country' => 'required',
				'ship_division_id' => 'required|integer',
				'ship_district_id' => 'required|integer',
				'ship_zip' => 'required',
				'ship_address1' => 'required',
			]);
		}
		if($request->payment == 'cash'){
			$billing = BillingAddress::create(array(
				"firstname" => $request->firstname,
				"lastname" => $request->lastname,
				"email" => $request->email,
				"phone" => $request->phone,
				"country" => $request->country,
				"division_id" => $request->division_id,
				"district_id" => $request->district_id,
				"zip_code" => $request->zip,
				"address" => $request->address1,
			));
		if ($request->checkbox == "on") {
			$shipping = ShippingAddress::create(array(
				"firstname" => $request->ship_firstname,
				"lastname" => $request->ship_lastname,
				"email" => $request->ship_email,
				"phone" => $request->ship_phone,
				"country" => $request->ship_country,
				"division_id" => $request->ship_division_id,
				"district_id" => $request->ship_district_id,
				"shipping_note" => $request->shipping_note,
				"zip_code" => $request->ship_zip,
				"address" => $request->ship_address1,
				"shipping_note" => $request->ship_address1,
			));
		} else {
			$shipping = NULL;
		}
		$payAdvance = 0;
		$CountItem=0;
		$contentC = Cart::content();
		foreach ($contentC as $row) {
			$CountItem += intval($row->qty);
		}
		$payAdvance = $CountItem * 200;
		$post_data = array();
		$post_data['total_amount'] = $payAdvance; # You can't not pay less than 10
		$post_data['currency'] = "BDT";
		$post_data['tran_id'] = uniqid(); // tran_id must be unique
		# CUSTOMER INFORMATION
		$post_data['cus_name'] = 'Customer Name';
		$post_data['cus_email'] = 'customer@mail.com';
		$post_data['cus_add1'] = 'Customer Address';
		$post_data['cus_add2'] = "";
		$post_data['cus_city'] = "";
		$post_data['cus_state'] = "";
		$post_data['cus_postcode'] = "";
		$post_data['cus_country'] = "Bangladesh";
		$post_data['cus_phone'] = '8801XXXXXXXXX';
		$post_data['cus_fax'] = "";
		# SHIPMENT INFORMATION
		$post_data['ship_name'] = "Store Test";
		$post_data['ship_add1'] = "Dhaka";
		$post_data['ship_add2'] = "Dhaka";
		$post_data['ship_city'] = "Dhaka";
		$post_data['ship_state'] = "Dhaka";
		$post_data['ship_postcode'] = "1000";
		$post_data['ship_phone'] = "";
		$post_data['ship_country'] = "Bangladesh";
		$post_data['shipping_method'] = "NO";
		$post_data['product_name'] = "Computer";
		$post_data['product_category'] = "Goods";
		$post_data['product_profile'] = "physical-goods";
		# OPTIONAL PARAMETERS
		$post_data['value_a'] = "ref001";
		$post_data['value_b'] = "ref002";
		$post_data['value_c'] = "ref003";
		$post_data['value_d'] = "ref004";
		// dd($request->all());
		$invoice = Order::orderBy('invoice_id', 'DESC')->first();
		if ($invoice != null) {
			$in = $invoice->invoice_id + 1;
		} else {
			$in = 1;
		}
		if ($shipping != null) {
			$ship = $shipping->id;
		} else {
			$ship = 0;
		}
		$sub = Cart::subtotal();
		$tot =(float)$sub;
	
		$t_final= $tot - $request->discount;

	
		$order = $order = Order::where('transaction_id', $post_data['tran_id'])->create(array(
			'invoice_id' => $in,
			'payment_method' => $request->payment,
			'total' => $t_final,
			'discount'=>$request->discount,
			'shipping_id' => $ship,
			'billing_id' => $billing->id,
			'status' => 0,
			'order_type'=>0,
			'transaction_id' => $post_data['tran_id'],
		));
		$content = Cart::content();
		$details = array();
		foreach ($content as $row) {
			$details['order_id'] = $order->id;
			$details['package_id'] = $row->id;
			$details['qty'] = $row->qty;
			$details['price'] = $row->price;
			$details['discount']= $row->qty * ($row->price - $row->options['sale_price']);
			$details['total'] = ($row->qty * $row->price) - $details['discount'];
			OrderDetails::create($details);
		}
		$billing_address  = DB::table('billing_addresses')
		->select('billing_addresses.*','districts.name as district_name', 'divisions.name as division_name')
		->join('districts','districts.id','=','billing_addresses.district_id')
		->join('divisions','divisions.id','=','billing_addresses.division_id')
		->where('billing_addresses.status', 1)
		->where('billing_addresses.id',$order->billing_id)
		->first();
		
// dd($post_data['total_amount']);
		$sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');
        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
		Cart::destroy();
		return redirect('/order/complete')->with('complete','complete');;
	}
    elseif($request->payment == 'ssl'){
		
		$billing = BillingAddress::create(array(
			"firstname" => $request->firstname,
			"lastname" => $request->lastname,
			"email" => $request->email,
			"phone" => $request->phone,
			"country" => $request->country,
			"division_id" => $request->division_id,
			"district_id" => $request->district_id,
			"zip_code" => $request->zip,
			"address" => $request->address1,
		));
		if ($request->checkbox == "on") {
			$shipping = ShippingAddress::create(array(
				"firstname" => $request->ship_firstname,
				"lastname" => $request->ship_lastname,
				"email" => $request->ship_email,
				"phone" => $request->ship_phone,
				"country" => $request->ship_country,
				"division_id" => $request->ship_division_id,
				"district_id" => $request->ship_district_id,
				"shipping_note" => $request->shipping_note,
				"zip_code" => $request->ship_zip_code,
				"address" => $request->ship_address,
			));
		} else {
			$shipping = NULL;
		}
		$invoice = Order::orderBy('invoice_id', 'DESC')->first();
		if ($invoice != null) {
			$in = $invoice->invoice_id + 1;
		} else {
			$in = 1;
		}

		if ($shipping != null) {
			$ship = $shipping->id;
		} else {
			$ship = 0;
		}
		$extraDisCount = 0;
		$rowCount=0;
		$content = Cart::content();
		foreach ($content as $row) {
			
			$rowCount += intval($row->qty);
			
			// dd($extraDisCount);
		}
		$extraDisCount = $rowCount * 200;
		$sub = Cart::subtotal();
		$tot =(float)$sub;
		$t_final= $tot - $request->discount;
		$post_data = array();
		$post_data['total_amount'] = $t_final-$extraDisCount; # You can't not pay less than 10
		$post_data['currency'] = "BDT";
		$post_data['tran_id'] = uniqid(); // tran_id must be unique
		# CUSTOMER INFORMATION
		$post_data['cus_name'] = 'Customer Name';
		$post_data['cus_email'] = 'customer@mail.com';
		$post_data['cus_add1'] = 'Customer Address';
		$post_data['cus_add2'] = "";
		$post_data['cus_city'] = "";
		$post_data['cus_state'] = "";
		$post_data['cus_postcode'] = "";
		$post_data['cus_country'] = "Bangladesh";
		$post_data['cus_phone'] = '8801XXXXXXXXX';
		$post_data['cus_fax'] = "";
		# SHIPMENT INFORMATION
		$post_data['ship_name'] = "Store Test";
		$post_data['ship_add1'] = "Dhaka";
		$post_data['ship_add2'] = "Dhaka";
		$post_data['ship_city'] = "Dhaka";
		$post_data['ship_state'] = "Dhaka";
		$post_data['ship_postcode'] = "1000";
		$post_data['ship_phone'] = "";
		$post_data['ship_country'] = "Bangladesh";
		$post_data['shipping_method'] = "NO";
		$post_data['product_name'] = "Computer";
		$post_data['product_category'] = "Goods";
		$post_data['product_profile'] = "physical-goods";
		# OPTIONAL PARAMETERS
		$post_data['value_a'] = "ref001";
		$post_data['value_b'] = "ref002";
		$post_data['value_c'] = "ref003";
		$post_data['value_d'] = "ref004";
		$order = Order::where('transaction_id', $post_data['tran_id'])->create(array(
			'invoice_id' => $in,
			'payment_method' => $request->payment,
			'total' => $t_final,
			'shipping_id' => $ship,
			'discount'=>$request->discount,
			'billing_id' => $billing->id,
			'status' => 0,
			'order_type'=>0,
			'transaction_id' => $post_data['tran_id'],
		));
		$content = Cart::content();
		$details = array();
		foreach ($content as $row) {
			$details['order_id'] = $order->id;
			$details['package_id'] = $row->id;
			$details['qty'] = $row->qty;
			$details['price'] = $row->price;
			$details['discount']= $row->qty * ($row->price - $row->options['sale_price']);
			$details['total'] = ($row->qty * $row->price) - $details['discount'];
			OrderDetails::create($details);
		}
		// $email=$request->email;
		// $f_name = $request->firstname;
		// $o_id  = $order->id;
		// $total_f = $sub;
    	// $r=	session(['email' => '$email']);
		// Session::put('f_name', $f_name);
		// Session::put('o_id', $o_id);
		// Session::put('total_f', $total_f);
		// Session::save();
        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');
        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
		Cart::destroy();
		return redirect('/order/complete')->with('complete','complete');;
    }
    else{
	return back()->with('error','payment method not found');
    }
}
public function success(Request $request)
{
	$email="";
	$f_name="";
	$tran_id = $request->input('tran_id');
	$amount = $request->input('amount');
	$currency = $request->input('currency');
	$sslc = new SslCommerzNotification();
	#Check order status in order tabel against the transaction id or order id.
	$order_detials = DB::table('orders')
		->where('transaction_id', $tran_id)
		->select('transaction_id', 'status', 'total')->first();
	//ssl
	$extraDisCount = 0;
	$rowCount=0;
 	$orderDetails =  DB::table('orders')->where('transaction_id', $tran_id)->first();	
	$order_d = DB::table('order_details')->where('order_id',$orderDetails->id)->get();
	foreach ($order_d as $row) {	
		$rowCount += intval($row->qty);
	}
	$extraDisCount = $rowCount * 200;
	//conditional sale
	$payAdvance = 0;
	$CountItem=0;
	$contentC = DB::table('order_details')->where('order_id',$orderDetails->id)->get();
	foreach ($contentC as $row) {
		$CountItem += intval($row->qty);
	}
	$payAdvance = $CountItem * 200;

	if ($order_detials->status == 0) {
		$validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);
		if ($validation == TRUE) {
			/*
			That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
			in order table as Processing or Complete.
			Here you can also sent sms or email for successfull transaction to customer
			*/
			$update_product = DB::table('orders')
			->where('transaction_id', $tran_id)
			->update(['status' => 1]);
			$pay_method = DB::table('orders')
			->where('transaction_id', $tran_id)->first();
			if($pay_method->payment_method == 'cash'){
				$update_product = DB::table('orders')
				->where('transaction_id', $tran_id)
				->update(['paid' => $payAdvance ]);
			}
			if($pay_method->payment_method == 'ssl'){
				$update_product = DB::table('orders')
				->where('transaction_id', $tran_id)
				->update(['extra_discount' => $extraDisCount]);
			}
			$order =  Order::where('transaction_id', $tran_id)->first();

			$billing_address  = DB::table('billing_addresses')
			->select('billing_addresses.*','districts.name as district_name', 'divisions.name as division_name')
			->join('districts','districts.id','=','billing_addresses.district_id')
			->join('divisions','divisions.id','=','billing_addresses.division_id')
			->where('billing_addresses.status', 1)
			->where('billing_addresses.id',$order->billing_id)
			->first();

			if(!empty($billing_address)){
				$email=$billing_address->email;
				$data = array(			
					'email'=>$email,
					'order_id'  => $order->id,
					'invoice_id' => $order->invoice_id,
					'date' => $order->created_at,
					'payment_method' => $order->payment_method,
					'billing_address'=>$billing_address,
					'order'=>$order,
				);
			}
			$book_order  =OrderDetails::where('order_id',$order->id)->first();
			$train_order =TrainOrderDetails::where('order_id',$order->id)->first();
			if(!empty($book_order)){
			\Mail::send('email/confirmOrderMail',$data, function($message) use($email) {
				$message->from('a7604366@gmail.com','Taxman');
				$message->to($email)->subject('Order Details');
			});
			}
			if(!empty($train_order)){
				\Mail::send('email/confirmOrderMail2',$data, function($message) use($email) {
					$message->from('a7604366@gmail.com','Taxman');
					$message->to($email)->subject('Order Details');
				});
				}
			if(!empty($book_order)){
				Cart::destroy();
				return redirect('/order/complete')->with('complete','complete');
			}
			if(!empty($train_order)){
				Cart::destroy();
				return redirect('/order/complete2')->with('complete2','complete2');
			}
			
		} else {
			/*
			That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
			Here you need to update order status as Failed in order table.
			*/
			$update_product = DB::table('orders')
				->where('transaction_id', $tran_id)
				->update(['status' => 5]);
			    echo "validation Fail";
		}
	} else if ($order_detials->status == 1 || $order_detials->status == 3) {
		/*
		 That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
		 */
		return 'Transaction successful.';
		// return redirect('/order/complete');
	} else {
		#That means something wrong happened. You can redirect customer to your product page.
		echo "Invalid Transaction";
	}
}
public function fail(Request $request)
{
	$tran_id = $request->input('tran_id');
	$order_detials = DB::table('orders')
		->where('transaction_id', $tran_id)
		->select('transaction_id', 'status', 'total')->first();
	if ($order_detials->status == 0) {
		$update_product = DB::table('orders')
		->where('transaction_id', $tran_id)
		->update(['status' => 5]);
		echo "Transaction is Falied";
	} else if ($order_detials->status == 1 || $order_detials->status == 3) {
		echo "Transaction is already Successful";
	} else {
		echo "Transaction is Invalid";
	}
}
public function cancel(Request $request)
{
	$tran_id = $request->input('tran_id');
	$order_detials = DB::table('orders')
		->where('transaction_id', $tran_id)
		->select('transaction_id', 'status', 'total')->first();
	if ($order_detials->status == 0) {
		$update_product = DB::table('orders')
		->where('transaction_id', $tran_id)
		->update(['status' => 4]);
		echo "Transaction is Cancel";
	} else if ($order_detials->status == 1 || $order_detials->status == 3) {
		echo "Transaction is already Successful";
	} else {
		echo "Transaction is Invalid";
	}
}
public function ipn(Request $request)
{
	#Received all the payement information from the gateway
	if ($request->input('tran_id')) #Check transation id is posted or not.
	{
		$tran_id = $request->input('tran_id');
		#Check order status in order tabel against the transaction id or order id.
		$order_details = DB::table('orders')
			->where('transaction_id', $tran_id)
			->select('transaction_id', 'status', 'total')->first();
		if ($order_details->status == 0) {
			$sslc = new SslCommerzNotification();
			$validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
			if ($validation == TRUE) {
				/*
				That means IPN worked. Here you need to update order status
				in order table as Processing or Complete.
				Here you can also sent sms or email for successful transaction to customer
				*/
				$update_product = DB::table('orders')
					->where('transaction_id', $tran_id)
					->update(['status' => 1]);
				echo "Transaction is successfully Completed";
			} else {
				/*
				That means IPN worked, but Transation validation failed.
				Here you need to update order status as Failed in order table.
				*/
				$update_product = DB::table('orders')
					->where('transaction_id', $tran_id)
					->update(['status' => 5]);
				echo "validation Fail";
			}

		} else if ($order_details->status == 1 || $order_details->status == 3) {
			#That means Order status already updated. No need to udate database.
			echo "Transaction is already successfully Completed";
		} else {
			#That means something wrong happened. You can redirect customer to your product page.
			echo "Invalid Transaction";
		}
	} else {
		echo "Invalid Data";
	}
}
public function ordercomplete(){
	$title = 'Order Complete';
	$meta_img = '';
	$description = '';
	$order=Order::latest()->first();
	if($order->shipping_id != 0) {
		$orders = DB::table('orders')
		->select('orders.*','orders.id as oid', 'billing_addresses.*', 'shipping_addresses.firstname as fname', 'shipping_addresses.lastname as lname', 'shipping_addresses.email as semail', 'shipping_addresses.phone as sphone','shipping_addresses.division_id as sdivision_id','shipping_addresses.district_id as sdistrict_id')
		->join('billing_addresses', 'billing_addresses.id', '=', 'orders.billing_id')
		->join('shipping_addresses', 'shipping_addresses.id', '=', 'orders.shipping_id')
		->where('orders.id',$order->id)
		->first();
	}else{
		$orders="null";
	}
	$district =District::all();
	$division =Division::all();
    return view('pages.order-complete',compact('order','orders','district','division','title','description','meta_img'));
}
public function ordercomplete2(){
	$title = 'Order Complete';
	$meta_img = '';
	$description = '';
	$order=Order::latest()->first();
		if($order->shipping_id != 0) {
			$orders = DB::table('orders')
			->select('orders.*','orders.id as oid', 'billing_addresses.*', 'shipping_addresses.firstname as fname', 'shipping_addresses.lastname as lname', 'shipping_addresses.email as semail', 'shipping_addresses.phone as sphone','shipping_addresses.division_id as sdivision_id','shipping_addresses.district_id as sdistrict_id')
			->join('billing_addresses', 'billing_addresses.id', '=', 'orders.billing_id')
			->join('shipping_addresses', 'shipping_addresses.id', '=', 'orders.shipping_id')
			->where('orders.id',$order->id)
			->first();
	}else{
		$orders="null";
	}
	$district =District::all();
	$division =Division::all();
	return view('pages.order-complete2',compact('order','orders','district','division','title','description','meta_img'));

}
}
