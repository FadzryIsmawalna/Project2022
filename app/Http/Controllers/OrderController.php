<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
    	return view('order.index', [
    		'order' => Order::all()
    	]);
    }

    public function create()
    {
    	return view('order.create', [
    		'customer' 	=> Customer::all(),
    		'menu' 		=> Menu::all()
    	]);
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'customerId'	=> ['required'],
    		'menuId'		=> ['required'],
    		'quantity'		=> ['required']
    	]);

    	$total = 0;

    	foreach ($request->menuId as $key => $m) {
    		$menu 		= Menu::where('id', $m)->first();
    		$sub_total	= $menu->price * $request->quantity[$key];

    		$total += $sub_total;
    	}

    	$customer = Customer::where('id', $request->customerId)->first();

    	if ($customer->member) {
    		$discount = $total * 10 / 100;
    		$total -= $discount;
    	}

    	$data_order = [
    		'customerId'	=> $request->customerId,
    		'code'			=> date('dmyis'),
    		'total'			=> $total
    	];

    	$order = Order::create($data_order);

    	foreach ($request->menuId as $key => $m) {
    		$menu		= Menu::where('id', $m)->first();
    		$sub_total	= $menu->price * $request->quantity[$key];

    		$data_order_item = [
    			'orderId'	=> $order->id,
    			'menuId'	=> $m,
    			'quantity'	=> $request->quantity[$key],
    			'subTotal'	=> $sub_total
    		];

    		OrderItem::create($data_order_item);
    	}

    	return redirect('/order')->with('success','order has been created');
    }

    public function show(Order $order)
    {
    	return view('order.show', [
    		'order'	=> $order
    	]);
    }

    public function edit(Order $order)
    {
    	return view('order.edit', [
    		'order'		=> Order::where('id', $order->id)->first(),
    		'customer'	=> Customer::all(),
    		'menu'		=> Menu::all()
    	]);
    }

    public function update(Request $request, Order $order)
    {
    	$request->validate([
    		'customerId'	=> ['required'],
    		'menuId'		=> ['required'],
    		'quantity'		=> ['required']
    	]);

    	$total = 0;

    	foreach ($request->menuId as $key => $m) {
    		$menu	    = Menu::where('id', $m)->first();
    		$sub_total	= $menu->price * $request->quantity[$key];

    		$total 		+= $sub_total;
    	}

    	$customer = Customer::where('id', $request->customerId)->first();

    	if ($customer->member) {
    		$discount	=  $total * 10 / 100;
    		$total 		-= $discount;
    	}

    	$data_order = [
    		'customerId'	=> $request->customerId,
    		'code'			=> $order->code,
    		'total'			=> $total
    	];

    	Order::where('id', $order->id)->update($data_order);
    	OrderItem::where('orderId', $order->id)->delete();

    	foreach ($request->menuId as $key => $m) {
    		$menu 		= Menu::where('id', $m)->first();
    		$sub_total	= $menu->price * $request->quantity[$key];

    		$data_order_item = [
    			'orderId'	=> $order->id,
    			'menuId'	=> $m,
    			'quantity'	=> $request->quantity[$key],
    			'sub_total'	=> $sub_total
    		];

    		OrderItem::create($data_order_item);
    	}

    	return redirect('/order')->with('success', 'Order has been updated');
    }

    public function destroy(Order $order)
    {
    	Order::where('id', $order->id)->delete();
    	OrderItem::where('orderId', $order->id)->delete();

    	return back()->with('success', 'order has been deleted!');
    }
}