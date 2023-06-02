<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    public function showAddAddressPage()
    {
        return view('dashboard/add-address');
    }

    public function showAddressPage()
    {
        $getaddress = Address::where('userid', Auth::user()->id)->get();
        return view('dashboard/address', compact('getaddress'));
    }

    public function showUserDetails()
    {
        $getuserdetails = User::where('id', Auth::user()->id)->get();
        return view('dashboard/user-details', compact('getuserdetails'));
    }

    public function orderIndex(){
        $orders = Order::where('userid', Auth::id())->get();
        return view('dashboard/order', compact('orders'));
    }

    public function orderList($orderid){
        $order_lists = OrderItem::where('order_id', $orderid)->get();
        $orders = Order::where('id', $orderid)->first();
        return view('dashboard/order-lists', compact('order_lists', 'orders'));
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:190'],
            'lname' => ['required', 'string', 'max:190'],
            'mobile' => ['required', 'numeric'],
            'locationName' => ['required', 'string', 'max:180'],
            'townName' => ['required', 'string', 'max:180'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'country' => ['required', 'string'],
            'pinCode' => ['required', 'numeric'],
        ]);

        if (Auth::check()) {
            $userid = Auth::user()->id;
            try {
                $addr_status = Address::where('userid', $userid)->where('address_status', 2)->update(['address_status' => 1]);
                $address_stored = Address::insert([
                    'userid' => $userid,
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                    'locationName' => $request->locationName,
                    'townName' => $request->townName,
                    'city' => $request->city,
                    'state' => $request->state,
                    'country' => $request->country,
                    'pincode' => $request->pinCode,
                    'address_status' => 2
                ]);
            } catch (Exception $e) {
                // return  $e->getMessage();
                // $request->session()->put('error', $e->getMessage());
                return redirect()->back()->with(session()->flash('error', $e->getMessage()));
            }

            if ($addr_status && $address_stored) {
                if ($request->chelbrt == 'chec_ldsa') {
                    return redirect()->back()->with(session()->flash('success', 'Address Successfully Saved.'));
                } else {
                    return redirect('user/address')->with(session()->flash('success', 'Address Successfully Saved.'));
                }
            } else {
                return redirect()->back()->with(session()->flash('error', 'Something went wrong.'));
            }
        } else {
            dd(true); die;
            if (User::where('mobile', $request->mobile)->orWhere('email', $request->email)->exists()) {
                try {
                    $userdetails = User::where('mobile', $request->mobile)->orWhere('email', $request->email)->first();
                    $addr_status = Address::where('userid', $userdetails->id)->where('address_status', 2)->update(['address_status' => 1]);
                    $address_stored = Address::insert([
                        'userid' => $userdetails->id,
                        'fname' => $request->fname,
                        'lname' => $request->lname,
                        'email' => $request->email,
                        'mobile' => $request->mobile,
                        'locationName' => $request->locationName,
                        'townName' => $request->townName,
                        'city' => $request->city,
                        'state' => $request->state,
                        'country' => $request->country,
                        'pincode' => $request->pinCode,
                        'address_status' => 2
                    ]);
                    $cartdetails = Cart::where('session_id', Session::getId())->update([
                        'userid' => $userdetails->id,
                    ]);
                } catch (Exception $e) {
                    // return  $e->getMessage();
                    // $request->session()->put('error', $e->getMessage());
                    return redirect()->back()->with(session()->flash('error', $e->getMessage()));
                }
                Auth::login(['email' => $request->email, 'password' => $request->mobile, 'active' => 1]);
            } else {
                try {
                    $user = User::create([
                        'first_name' => $request->fname,
                        'last_name' => $request->lname,
                        'mobile' => $request->mobile,
                        'email' => $request->email,
                        'password' => Hash::make($request->mobile),
                    ]);
                    $addr_status = Address::where('userid', $user->id)->where('address_status', 2)->update(['address_status' => 1]);
                    $address_stored = Address::insert([
                        'userid' => $user->id,
                        'fname' => $request->fname,
                        'lname' => $request->lname,
                        'email' => $request->email,
                        'mobile' => $request->mobile,
                        'locationName' => $request->locationName,
                        'townName' => $request->townName,
                        'city' => $request->city,
                        'state' => $request->state,
                        'country' => $request->country,
                        'pincode' => $request->pinCode,
                        'address_status' => 2
                    ]);
                    $cartdetails = Cart::where('session_id', Session::getId())->update([
                        'userid' => $user->id,
                    ]);
                } catch (Exception $e) {
                    // return  $e->getMessage();
                    // $request->session()->put('error', $e->getMessage());
                    return redirect()->back()->with(session()->flash('error', $e->getMessage()));
                }

                if ($addr_status && $address_stored) {
                    if ($request->chelbrt == 'chec_ldsa') {
                        return redirect()->back()->with(session()->flash('success', 'Address Successfully Saved.'));
                    } else {
                        return redirect('user/address')->with(session()->flash('success', 'Address Successfully Saved.'));
                    }
                } else {
                    return redirect()->back()->with(session()->flash('error', 'Something went wrong.'));
                }

                event(new Registered($user));
                Auth::login($user);
            }
        }
    }

    public function removeAddress(Request $request)
    {
        $address = Address::find($request->id);
        if ($address) {
            $address->delete();
            return redirect()->back()->with(session()->flash('success', 'Address Successfully Deleted.'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong.'));
        }
    }

    public function editAddress(Request $request)
    {
        $address = Address::find($request->id);
        if ($address) {
            return view('user.edit-address', compact('address'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong.'));
        }
    }

    public function storeGuestAddress(Request $request)
    {
        if (Auth::check()) {

        } else{
            if (User::where('mobile', $request->mobile)->orWhere('email', $request->email)->exists()) {
                try {
                    $userdetails = User::where('mobile', $request->mobile)->orWhere('email', $request->email)->first();
                    $addr_status = Address::where('userid', $userdetails->id)->where('address_status', 2)->update(['address_status' => 1]);
                    $address_stored = Address::insert([
                        'userid' => $userdetails->id,
                        'fname' => $request->fname,
                        'lname' => $request->lname,
                        'email' => $request->email,
                        'mobile' => $request->mobile,
                        'locationName' => $request->locationName,
                        'townName' => $request->townName,
                        'city' => $request->city,
                        'state' => $request->state,
                        'country' => $request->country,
                        'pincode' => $request->pinCode,
                        'address_status' => 2
                    ]);
                    $cartdetails = Cart::where('session_id', Session::getId())->update([
                        'userid' => $userdetails->id,
                    ]);
                    Auth::login($userdetails, true);
                    return redirect('checkout');
                } catch (Exception $e) {
                    // return  $e->getMessage();
                    // $request->session()->put('error', $e->getMessage());
                    return redirect()->back()->with(session()->flash('error', $e->getMessage()));
                }
            } else {
                try {
                    $user = User::create([
                        'first_name' => $request->fname,
                        'last_name' => $request->lname,
                        'mobile' => $request->mobile,
                        'email' => $request->email,
                        'password' => Hash::make($request->mobile),
                    ]);
                    $addr_status = Address::where('userid', $user->id)->where('address_status', 2)->update(['address_status' => 1]);
                    $address_stored = Address::insert([
                        'userid' => $user->id,
                        'fname' => $request->fname,
                        'lname' => $request->lname,
                        'email' => $request->email,
                        'mobile' => $request->mobile,
                        'locationName' => $request->locationName,
                        'townName' => $request->townName,
                        'city' => $request->city,
                        'state' => $request->state,
                        'country' => $request->country,
                        'pincode' => $request->pinCode,
                        'address_status' => 2
                    ]);
                    $cartdetails = Cart::where('session_id', Session::getId())->update([
                        'userid' => $user->id,
                    ]);

                    event(new Registered($user));
                    Auth::login($user);
                    return redirect('checkout');
                } catch (Exception $e) {
                    // return  $e->getMessage();
                    // $request->session()->put('error', $e->getMessage());
                    return redirect()->back()->with(session()->flash('error', $e->getMessage()));
                }

                // if ($addr_status && $address_stored) {
                //     if ($request->chelbrt == 'chec_ldsa') {
                //         return redirect()->back()->with(session()->flash('success', 'Address Successfully Saved.'));
                //     } else {
                //         return redirect('user/address')->with(session()->flash('success', 'Address Successfully Saved.'));
                //     }
                // } else {
                    return redirect()->back()->with(session()->flash('error', 'Something went wrong.'));
                // }
            }
        }
    }

    public function updateUserDetails(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string'],
            'lname' => ['required', 'string'],
            'mobile' => ['required', 'numeric'],
            'email' => ['required', 'email', 'unique:users,email'],
        ]);

        try {
            $userupdate = User::where('id', Auth::user()->id)
                            ->update([
                                'first_name' => $request->fname,
                                'last_name' => $request->lname,
                                'mobile' => $request->mobile,
                                'email' => $request->email,
                            ]);
        } catch (Exception $e) {
            // return  $e->getMessage();
            // $request->session()->put('error', $e->getMessage());
            return redirect()->back()->with(session()->flash('error', $e->getMessage()));
        }

        if ($userupdate) {
            return redirect()->back()->with(session()->flash('success', 'Details Successfully Updated.'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong.'));
        }
    }

    public function updateOldPassword(Request $request)
    {
        $request->validate([
            'oldPass' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
            if (Hash::check($request->oldPass, Auth::user()->password)) {
                $userpass = User::where('id', Auth::user()->id)
                                ->update([
                                    'password' => Hash::make($request->password)
                                ]);
            } else {
                return redirect()->back()->with(session()->flash('error', 'Password not matched with our records.'));
            }
        } catch (Exception $e) {
            // return  $e->getMessage();
            // $request->session()->put('error', $e->getMessage());
            return redirect()->back()->with(session()->flash('error', $e->getMessage()));
        }

        if ($userpass) {
            return redirect()->back()->with(session()->flash('success', 'Password Successfully Updated.'));
        } else {
            return redirect()->back()->with(session()->flash('success', 'Something! went wrong. Please! try again later.'));
        }

    }
}
