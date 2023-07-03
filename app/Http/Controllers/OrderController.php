<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Seshac\Shiprocket\Shiprocket;

class OrderController extends Controller
{
    // this just returns all orders, previous dev named it new order
    public function newOrder()
    {
        // $neworders = Order::where('status', 0)->paginate(20);
        // dd($neworders);
        // return orders from Shiprocket
        $token =  Shiprocket::getToken();
        $orderDetails = [];
        $allOrders =  Shiprocket::order($token)->getOrders($orderDetails);
        return view('admin/new-order', compact('allOrders'));
    }

    public static function getItemCount($orderid){
        $totalitem = OrderItem::where('order_id', $orderid)->count();
        return $totalitem;
    }

    public function orderDetails($order_id){
        $orders = OrderItem::where('order_id', $order_id)->get();
        $customerdetails = Order::where('id', $order_id)->first();
        return view('admin/order-details', compact('orders', 'customerdetails'));
    }

    public function placeOrder(Request $request){
        $request->validate([
            'tracking_no' => ['required', 'string'],
        ]);

        $placed = Order::where('id', $request->orderid)->update([
            'tracking_no' => $request->tracking_no,
            'shipping_date' => now(),
            'status' => 1,
        ]);

        if ($placed) {
            return redirect('admin/new-order')->with(session()->flash('success', 'Order successfully placed.'));
        } else{
            return redirect()->back()->with(session()->flash('error', 'Hi, Something went wrong. Please! try again later.'));
        }
    }

    public function shippedOrder()
    {
        // $shippedorders = Order::where('status', 1)->paginate(20);
        $token =  Shiprocket::getToken();
        $orderDetails = [];
        $allOrders =  Shiprocket::order($token)->getOrders($orderDetails);

        return view('admin/shipped-order', compact('allOrders'));
    }

    public function ordersDetail($order_id)
    {
        $orders = OrderItem::where('order_id', $order_id)->get();
        $customerdetails = Order::where('id', $order_id)->first();
        return view('admin/orders-detail', compact('orders', 'customerdetails'));
    }

    public function delivered(Request $request)
    {
        $request->validate([
            'orderid' => ['required', 'numeric'],
        ]);

        $delivered = Order::where('id', $request->orderid)->update(['status' => 2, 'delivered_date' => now()]);
        if ($delivered) {
            return redirect('admin/shipped-order')->with(session()->flash('success', 'Order successfully delivered'));
        } else {
            return redirect('admin/shipped-order')->with(session()->flash('error', 'Hi, Something went wrong. Please! try again later.'));
        }
    }

    public function deliveredOrder()
    {
        // $deliveredorders = Order::where('status', 2)->paginate(20);
        $token =  Shiprocket::getToken();
        $orderDetails = [];
        $allOrders =  Shiprocket::order($token)->getOrders($orderDetails);
        return view('admin/delivered-order', compact('allOrders'));

    }

    public function trackOrder(Request $request){
        $orderId = $request->orderid;
        $token =  Shiprocket::getToken();
        $shipment =  Shiprocket::track($token)->throwOrderId($orderId);
        return $shipment;
    }
}
