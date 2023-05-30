<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $prod_lists = Cart::where('userid', $userid)->get();
            $shipping_addr = Address::where('userid', Auth::user()->id)->where('address_status', 2)->first();
            $shipping_address = Address::where('userid', Auth::user()->id)->get();
            return view('checkout', compact('prod_lists', 'shipping_address', 'shipping_addr'));
        } else {
            //Without Login Show the page
            $sessionid = Session::getId();
            $prod_lists = Cart::where('session_id', $sessionid)->get();
            $shipping_addr = Address::where('userid', 0)->where('address_status', 2)->first();
            $shipping_address = Address::where('userid', 0)->get();
            return view('checkout', compact('prod_lists', 'shipping_address', 'shipping_addr'));
            // return response()->json(['status' => "Login to continue"]);
        }
    }

    public function addressMakeDefault(Request $request)
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $addr_status = Address::where('userid', $userid)->where('address_status', 2)->update(['address_status' => 1]);
            $addr_default = Address::where('userid', $userid)->where('id', $request->make_address_default)->update([
                'address_status' => 2
            ]);
            if ($addr_status && $addr_default) {
                return redirect()->back()->with(session()->flash('success', 'Address successfully changed.'));
            } else {
                return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
            }
        } else {
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function completeOrder(Request $request){
        if (Auth::check()) {
            $useraddr = Address::where('userid', Auth::id())->where('address_status', 2)->first();
            if ($useraddr) {
                try {
                    $order = Order::create([
                        'userid' => Auth::user()->id,
                        'fname' => $useraddr->fname,
                        'lname' => $useraddr->lname,
                        'email' => $useraddr->email,
                        'mobile' => $useraddr->mobile,
                        'address1' => $useraddr->locationName,
                        'address2' => $useraddr->townName,
                        'city' => $useraddr->city,
                        'state' => $useraddr->state,
                        'country' => $useraddr->country,
                        'pincode' => $useraddr->pincode,
                        'total_amount' => $request->amount,
                        'payment_mode' => $request->payment_mode,
                    ]);

                    $cartItems = Cart::where('userid', Auth::id())->get();
                    foreach ($cartItems as $key => $cartitem) {
                        OrderItem::create([
                            'order_id' => $order->id,
                            'product_id' => $cartitem->productid,
                            'quantity' => $cartitem->quantity,
                            'price' => $cartitem->products->price,
                        ]);
                    }
                    Cart::destroy($cartItems);
                    return redirect('user/dashboard')->with(session()->flash('success', 'Your order successfully placed.'));
                } catch (Exception $e) {
                    // return  $e->getMessage();
                    // $request->session()->put('error', $e->getMessage());
                    return redirect()->back()->with(session()->flash('error', $e->getMessage()));
                }
            } else {
                return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please check if you have added an address'));
            }
        } else {
            return response()->json(['status' => "Login to continue"]);
        }

    }
}
