<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_review;
use App\Models\Promocode;
use App\Models\Promocode_releted_customer;
use App\Models\Promocode_releted_product;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function home()
    {
        $brands = Brand::where('brand_status', '1')->get();
        $categories = Category::where('category_status', '1')->get();
        // $bsps = Product::with('product_images')->with('categories')->get()->map(function($album) {
        //     $album->setRelation('product_images', $album->product_images->take(1));
        //     return $album;
        // });
        $bsps = Product::take(4)->orderBy('id', 'asc')->get();
        $newarrivals = Product::orderBy('created_at', 'desc')->take(10)->get();
        $toproducts = Product::where('is_top_product', 'on')->get();
        $featured = Product::where('is_featured', 'on')->take(4)->get();
        return view('home', compact('brands', 'categories', 'bsps', 'newarrivals', 'toproducts', 'featured'));
    }

    public function categories_show()
    {
        $category_lists = Category::where('category_status', '=', '1')->get();
        return view('category', compact('category_lists'));
    }

    public function show_brands()
    {
        $brand_lists = Brand::where('brand_status', '=', '1')->get();
        return view('brands', compact('brand_lists'));
    }

    public function getCategory()
    {
        $outputh = '';
        $header_categories = Category::where('category_status', '1')->get();
        $total_row = $header_categories->count();
        if ($total_row > 0) {
            foreach ($header_categories as $value) {
                $outputh .= '
                <li><a href="' . url('products/category') . '/' . $value->category_slug . '">' . $value->category . '</a></li>
                ';
            }
        } else {
            $outputh .= '<li><a href="#">Not Available</a></li>';
        }

        echo $outputh;
    }

    public function getBrand()
    {
        $outputb = '';
        $header_brands = Brand::where('brand_status', '1')->get();
        $total_row = $header_brands->count();
        if ($total_row > 0) {
            foreach ($header_brands as $brand) {
                $outputb .= '
                <li><a href="' . url('products/brand') . '/' . $brand->brand_slug . '">' . $brand->brand . '</a></li>
                ';
            }
        } else {
            $outputb .= '<li><a href="#">Not Available</a></li>';
        }

        echo $outputb;
    }

    public function buyNow(Request $request)
    {
        if (Auth::check()) {
            $uid = Auth::user()->id;
            $request->validate([
                'quantity' => ['required', 'numeric'],
                'pid' => ['required', 'string'],
            ]);

            try {
                $prod_check = Product::where('product_id', $request->pid)->first();
                if ($prod_check) {
                    if (Cart::where('productid', $request->pid)->where('userid', $uid)->exists()) {
                        return redirect('checkout');
                    } else {
                        // dd($request->all()); die;
                        $cart = Cart::create([
                            'userid' => $uid,
                            'productid' => $request->pid,
                            'quantity' => $request->quantity,
                        ]);
                    }
                } else {
                    return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again.'));
                }

                if ($cart) {
                    return redirect('checkout')->with(session()->flash('success', 'Product successfully added in cart.'));
                } else {
                    return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
                }
            } catch (Exception $e) {
                // return $e->getMessage();
                return redirect()->back()->with(session()->flash('error', $e->getMessage()));
            }

        } else {
            //Without Login Buy Now
            $sessionid = Session::getId();
            $request->validate([
                'quantity' => ['required', 'numeric'],
                'pid' => ['required', 'string'],
            ]);

            try {
                $prod_check = Product::where('product_id', $request->pid)->first();
                if ($prod_check) {
                    if (Cart::where('productid', $request->pid)->where('session_id', $sessionid)->exists()) {
                        return redirect('checkout');
                    } else {
                        // dd($request->all()); die;
                        $cart = Cart::create([
                            'userid' => 0,
                            'session_id' => $sessionid,
                            'productid' => $request->pid,
                            'quantity' => $request->quantity,
                        ]);
                    }
                } else {
                    return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again.'));
                }

            } catch (Exception $e) {
                // return $e->getMessage();
                return redirect()->back()->with(session()->flash('error', $e->getMessage()));
            }

            if ($cart) {
                return redirect('checkout')->with(session()->flash('success', 'Product successfully added in cart.'));
            } else {
                return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
            }
            // return response()->json(['status' => "Login to continue"]);
        }
    }

    public function addtocart(Request $request)
    {
        if (Auth::check()) {
            $uid = Auth::user()->id;
            $request->validate([
                'quantity' => ['required', 'numeric'],
                'pid' => ['required', 'string'],
            ]);

            try {
                $prod_check = Product::where('product_id', $request->pid)->first();
                if ($prod_check) {
                    if (Cart::where('productid', $request->pid)->where('userid', $uid)->exists()) {
                        return redirect()->back()->with(session()->flash('error', 'Product already added to cart.'));
                    } else {
                        // dd($request->all()); die;
                        $cart = Cart::create([
                            'userid' => $uid,
                            'productid' => $request->pid,
                            'quantity' => $request->quantity,
                        ]);
                    }
                } else {
                    return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again.'));
                }

            } catch (Exception $e) {
                // return $e->getMessage();
                return redirect()->back()->with(session()->flash('error', $e->getMessage()));
            }

            if ($cart) {
                return redirect()->back()->with(session()->flash('success', 'Product successfully added in cart.'));
            } else {
                return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
            }
        } else {
            //Without Login Add to cart
            $sessionid = Session::getId();
            $request->validate([
                'quantity' => ['required', 'numeric'],
                'pid' => ['required', 'string'],
            ]);

            try {
                $prod_check = Product::where('product_id', $request->pid)->first();
                if ($prod_check) {
                    if (Cart::where('productid', $request->pid)->where('session_id', $sessionid)->exists()) {
                        return redirect()->back()->with(session()->flash('error', 'Product already added to cart.'));
                    } else {
                        // dd($request->all()); die;
                        $cart = Cart::create([
                            'userid' => 0,
                            'session_id' => $sessionid,
                            'productid' => $request->pid,
                            'quantity' => $request->quantity,
                        ]);
                    }
                } else {
                    return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again.'));
                }

            } catch (Exception $e) {
                // return $e->getMessage();
                return redirect()->back()->with(session()->flash('error', $e->getMessage()));
            }

            if ($cart) {
                return redirect()->back()->with(session()->flash('success', 'Product successfully added in cart.'));
            } else {
                return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
            }
            // return response()->json(['status' => "Login to continue"]);
        }
    }

    public function adonaddtocart(Request $request)
    {
        if (Auth::check()) {
            $uid = Auth::user()->id;
            $request->validate([
                'pid*' => ['required', 'string'],
            ]);

            try {
                $products = explode(',', $request->pid);
                $prod_check = Product::whereIn('product_id', $products)->get();
                if ($prod_check) {
                    if (Cart::whereIn('productid', $products)->where('userid', $uid)->exists()) {
                        return redirect()->back()->with(session()->flash('error', 'Product already added to cart.'));
                    } else {
                        for ($i = 0; $i < count($products); $i++) {
                            $cart = Cart::create([
                                'userid' => $uid,
                                'productid' => $products[$i],
                                'quantity' => 1,
                            ]);
                        }
                    }
                } else {
                    return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again.'));
                }

            } catch (Exception $e) {
                // return $e->getMessage();
                return redirect()->back()->with(session()->flash('error', $e->getMessage()));
            }

            if ($cart) {
                return redirect()->back()->with(session()->flash('success', 'Product successfully added in cart.'));
            } else {
                return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
            }
        } else {
            $sessionid = Session::getId();
            $request->validate([
                'pid*' => ['required', 'string'],
            ]);

            try {
                $products = explode(',', $request->pid);
                $prod_check = Product::whereIn('product_id', $products)->get();
                if ($prod_check) {
                    if (Cart::whereIn('productid', $products)->where('session_id', $sessionid)->exists()) {
                        return redirect()->back()->with(session()->flash('error', 'Product already added to cart.'));
                    } else {
                        for ($i = 0; $i < count($products); $i++) {
                            $cart = Cart::create([
                                'userid' => 0,
                                'session_id' => $sessionid,
                                'productid' => $products[$i],
                                'quantity' => 1,
                            ]);
                        }
                    }
                } else {
                    return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again.'));
                }

            } catch (Exception $e) {
                // return $e->getMessage();
                return redirect()->back()->with(session()->flash('error', $e->getMessage()));
            }

            if ($cart) {
                return redirect()->back()->with(session()->flash('success', 'Product successfully added in cart.'));
            } else {
                return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
            }
            // return response()->json(['status' => "Login to continue"]);
        }
    }

    public function shoppingCart()
    {
        if (Auth::check()) {
            $userid = Auth::user()->id;
            $cart_lists = Cart::where('userid', $userid)->get();
            return view('cart', compact('cart_lists'));
        } else {
            //Without Login Cart list
            $sessionid = Session::getId();
            $cart_lists = Cart::where('session_id', $sessionid)->get();
            return view('cart', compact('cart_lists'));
            // return response()->json(['status' => "Login to continue"]);
        }
    }

    public function deleteCartItem(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Cart::where('productid', $prod_id)->where('userid', Auth::user()->id)->exists()) {
                $cartItem = Cart::where('productid', $prod_id)->where('userid', Auth::user()->id)->first();
                $cartItem->delete();
                return response()->json(['status' => "Product Deleted Successfully"]);
            }
        } else {
            //Without Login cart delete
            $sessionid = Session::getId();
            $prod_id = $request->input('prod_id');
            if (Cart::where('productid', $prod_id)->where('session_id', $sessionid)->exists()) {
                $cartItem = Cart::where('productid', $prod_id)->where('session_id', $sessionid)->first();
                $cartItem->delete();
                return response()->json(['status' => "Product Deleted Successfully"]);
            }
            // return response()->json(['status' => "Login to continue"]);
        }
    }

    public function updateQuantity(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            $product_qty = $request->input('qty');
            // dd($request->all()); die;
            if (Cart::where('productid', $prod_id)->where('userid', Auth::user()->id)->exists()) {
                $cart = Cart::where('productid', $prod_id)->where('userid', Auth::user()->id)->update([
                    'quantity' => $product_qty,
                ]);
                return response()->json(['status' => "Quantity Updated"]);
            }
        } else {
            //Without Login quantity update
            $sessionid = Session::getId();
            $prod_id = $request->input('prod_id');
            $product_qty = $request->input('qty');
            // dd($request->all()); die;
            if (Cart::where('productid', $prod_id)->where('session_id', $sessionid)->exists()) {
                $cart = Cart::where('productid', $prod_id)->where('session_id', $sessionid)->update([
                    'quantity' => $product_qty,
                ]);
                return response()->json(['status' => "Quantity Updated"]);
            }
            // return response()->json(['status' => "Login to continue"]);
        }
    }

    public function productRating(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'rating' => ['required'],
            'message' => ['required', 'string'],
            'reviewimage' => ['optional', 'image', 'mimes:jpeg,png,jpg,webp'],
        ]);

        if ($request->hasfile('reviewimage')) {
            $file = $request->file('reviewimage');
            $extenstion = $file->getClientOriginalExtension();
            $reviewimage = time() . rand(1111, 9999) . '.' . $extenstion;
            $file->move(public_path('uploads/reviews'), $reviewimage);
        }

        $prating = new Product_review;
        $prating->productid = $request->productid;
        $prating->name = $request->name;
        $prating->email = $request->email;
        $prating->rating = $request->rating;
        $prating->message = $request->message;
        if ($request->hasfile('reviewimage')) {
            $prating->review_image = $reviewimage;
        }
        $prating->save();

        if ($prating) {
            return redirect()->back()->with(session()->flash('success', 'Your review successfully submited.'));
        } else {
            return redirect()->back()->with(session()->flash('error', 'Something went wrong. Please! try again later.'));
        }

    }

    public function promocodeMatch(Request $request)
    {
        $promocode = $request->input('promocode');
        if (Promocode::where('promocode', $promocode)->exists()) {
            $discount = Promocode::where('promocode', $promocode)->first();
            $cart_data = Cart::where('userid', Auth::id())->get();
            $totalprice = 0;
            $totalmrp = 0;
            foreach ($cart_data as $cartdata) {
                // if ($cartdata->products->tax_id) {
                //     $product_price_with_tax = ($cartdata->products->price*$cartdata->products->taxes->tax_percentage)/100; //Tax, Vat, GST
                // }
                $totalprice += $cartdata->quantity * $cartdata->products->price;
                $totalmrp += $cartdata->quantity * $cartdata->products->mrp;
            }

            $promorelatedpro = Promocode_releted_product::where('promocode_id', $discount->id)->pluck('product_id')->toArray();
            $promorelatedcus = Promocode_releted_customer::where('promocode_id', $discount->id)->pluck('customer_id')->toArray();
            $cartdd = $cart_data->pluck('productid')->toArray();
            $userid = User::where('id', Auth::user()->id)->pluck('id')->toArray();
            //Discount in percentage
            if ($discount->coupon_type === 'percentage') {
                if ($discount->apply_for == 'order_amount_from') {
                    if ($totalprice > $discount->order_amount) {
                        $discount_price = ($totalprice / 100) * $discount->discount;
                    } else {
                        return response()->json([
                            'message' => 'Oohoo! You are not eligible for this coupon code.',
                            'status' => 'error',
                        ]);
                    }
                } elseif ($discount->apply_for == 'product') {
                    $result = array_intersect($promorelatedpro, $cartdd);
                    if (count($result) > 0) {
                        $discount_price = ($totalprice / 100) * $discount->discount;
                    } else {
                        return response()->json([
                            'message' => 'Woohoo! This coupon code is not applied for this products.',
                            'status' => 'error',
                        ]);
                    }
                } elseif ($discount->apply_for == 'customer') {
                    $result = array_intersect($promorelatedcus, $userid);
                    if (count($result) > 0) {
                        $discount_price = ($totalprice / 100) * $discount->discount;
                    } else {
                        return response()->json([
                            'message' => 'Woohoo! This coupon code is not eligiable for you.',
                            'status' => 'error',
                        ]);
                    }
                } elseif ($discount->apply_for == 'all_products') {
                    $discount_price = ($totalprice / 100) * $discount->discount;
                } else {
                    return response()->json([
                        'message' => 'Somethig went wrong. Please! try again later.',
                        'status' => 'error',
                    ]);
                }
            } elseif ($discount->coupon_type === 'rupees') {
                if ($discount->apply_for == 'order_amount_from') {
                    if ($totalprice > $discount->order_amount) {
                        $discount_price = $discount->discount;
                    } else {
                        return response()->json([
                            'message' => 'Oohoo! You are not eligible for this coupon code.',
                            'status' => 'error',
                        ]);
                    }
                } elseif ($discount->apply_for == 'product') {
                    $result = array_intersect($promorelatedpro, $cartdd);
                    if (count($result) > 0) {
                        $discount_price = $discount->discount;
                    } else {
                        return response()->json([
                            'message' => 'Woohoo! This coupon code is not applied for this products.',
                            'status' => 'error',
                        ]);
                    }
                } elseif ($discount->apply_for == 'customer') {
                    $result = array_intersect($promorelatedcus, $userid);
                    if (count($result) > 0) {
                        $discount_price = $discount->discount;
                    } else {
                        return response()->json([
                            'message' => 'Woohoo! This coupon code is not eligiable for you.',
                            'status' => 'error',
                        ]);
                    }
                } elseif ($discount->apply_for == 'all_products') {
                    if ($totalprice > $discount->discount) {
                        $discount_price = $discount->discount;
                    } else {
                        return response()->json([
                            'message' => 'Oohoo! You are not eligible for this coupon code.',
                            'status' => 'error',
                        ]);
                    }
                } else {
                    return response()->json([
                        'message' => 'Somethig went wrong. Please! try again later.',
                        'status' => 'error',
                    ]);
                }
            } elseif ($discount->coupon_type === 'free_shipping') {
                $discount_price = 0;
            } elseif ($discount->coupon_type === 'same_price') {
                $discount_price = 0;
            }
            // if ($product_price_with_tax) {
            //     $disprice = $discount_price + $totalmrp + $product_price_with_tax;
            // } else {
            //     $disprice = $discount_price + $totalmrp;
            // }
            $grand_total = $totalprice - $discount_price;
            return response()->json([
                'discount_price' => $discount_price,
                'grand_total' => $grand_total,
            ]);
        } else {
            return response()->json([
                'message' => 'Coupon code does not exists.',
                'status' => 'error',
            ]);
        }
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            if ($request->cat == 0) {
                $output = "";
                $products = Product::where('product_name', 'LIKE', '%' . $request->search . "%")->orWhere('product_slug', 'LIKE', '%' . $request->search . "%")->get();
                if ($products) {
                    $output .= '<ul>';
                    foreach ($products as $product) {
                        $output .= '<a href="search?q=' . $product->product_name . '&cat='. $product->category_id .'"><li>' . $product->product_name . '</li></a>';
                    }
                    $output .= '</ul>';
                    return Response($output);
                }
            }else {
                return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong. Please try again.'));
            }
        }
    }

    public function searchList(Request $request){
        // $data = ['LoggedUserInfo'=>User::where('member_id','=', session('LoggedUser'))->first()];
        $pro_categories = Category::where('category_status', '1')->get();
        $pro_brands = Brand::where('brand_status', '1')->get();
        $cat = $request->get('cat');
        $searchfor = $request->get('q');
        $products = Product::where('product_name','LIKE','%'.$request->q."%")->orWhere('product_slug','LIKE','%'.$request->q."%")->paginate(15);
        return view('search.search')->with(compact('searchfor','cat', 'products', 'pro_categories', 'pro_brands'));
    }
}
