<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\TrainOrderDetails;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('status',1)->get();
        return view('admin.order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        // dd($order->shipping_id);
        if (!empty($order->shipping_id)) {
            $orders = DB::table('orders')
                ->select('orders.*', 'orders.id as oid', 'billing_addresses.*', 'shipping_addresses.firstname as fname', 'shipping_addresses.lastname as lname', 'shipping_addresses.email as semail', 'shipping_addresses.phone as sphone', 'shipping_addresses.division_id as sdivision_id', 'shipping_addresses.district_id as sdistrict_id','shipping_addresses.address as saddress')
                ->join('billing_addresses', 'billing_addresses.id', '=', 'orders.billing_id')
                ->join('shipping_addresses', 'shipping_addresses.id', '=', 'orders.shipping_id')
                ->where('orders.id', $id)
                ->first();
        } else {
            $orders = null;
        }
        $district = District::all();
        $division = Division::all();
        $users = User::all();
        //    dd($users);
        return view('admin.order.show', compact('order', 'district', 'division', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('id', $id)->delete();
        return back()->with('success', 'Order deleted Successfully');
    }
    public function orederriderstatus(Request $request, $id)
    {
        request()->validate([
            'status' => 'required|integer',
            'reschedul_date' => 'nullable',
        ]);
        Order::where('id', $id)->update(array(
            'status' => $request->status,
            'reschedul_date' => date("Y-m-d", strtotime($request->reschedul_date)),
        ));
        return back()->with('success', 'Order status change Successfully');
    }
    public function orederriderdetails($id)
    {
        $order = Order::find($id);
        if ($order->shipping_id != 0) {
            $orders = DB::table('orders')
                ->select('orders.*', 'orders.id as oid', 'billing_addresses.*', 'shipping_addresses.firstname as fname', 'shipping_addresses.lastname as lname', 'shipping_addresses.email as semail', 'shipping_addresses.phone as sphone', 'shipping_addresses.division_id as sdivision_id', 'shipping_addresses.district_id as sdistrict_id')
                ->join('billing_addresses', 'billing_addresses.id', '=', 'orders.billing_id')
                ->join('shipping_addresses', 'shipping_addresses.id', '=', 'orders.shipping_id')
                ->where('orders.id', $id)
                ->first();
        } else {
            $orders = "null";
        }
        $district = District::all();
        $division = Division::all();
        $users = User::all();
        return view('admin.rider.show', compact('order', 'orders', 'district', 'division', 'users'));
    }
    public function bookOrder(){
        $order = Order::where('status',1)->where('order_type',0)->get();
        $book_order = DB::table('order_details')
        ->where('status',1)
        ->distinct()->get(['order_id']);
        return view('admin.order.book-order', compact('order','book_order'));
    }
    public function trainingOrder(){
        $order = Order::where('status',1)->where('order_type',1)->get();
        $train_order = TrainOrderDetails::where('status',1)
        ->distinct()->get(['order_id']);
        return view('admin.order.train-order', compact('order','train_order'));
    }
}
