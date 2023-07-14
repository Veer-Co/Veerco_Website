<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Seshac\Shiprocket\Shiprocket;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class PhonePecontroller extends Controller
{
    public function phonePe(Request $request)
    {
        $payload = array (
            'merchantId' => getenv("PHONEPE_MERCHANTID"),
            'merchantTransactionId' => $request->transactionId,
            'merchantUserId' => str($request->userId)->value(),
            'amount' => $request->amount,
            'redirectUrl' => route('response'),
            'redirectMode' => 'POST',
            'callbackUrl' => route('response'),
            'mobileNumber' => $request->mobileNumber,
            'paymentInstrument' => array(
                'type' => 'PAY_PAGE'
            ),
        );
        $encoded = base64_encode(json_encode($payload));
        $saltKey = getenv("PHONEPE_SALT");
        
        $saltIndex = 1; // sample salt index
        
        $string = $encoded . "/pg/v1/pay" . $saltKey;
        $hash = hash("sha256", $string);

        $finalXheader = $hash . "###" . $saltIndex;

        $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/pay')
            ->withHeader('Content-Type:application/json')
            ->withHeader('X-VERIFY:'.$finalXheader)
            ->withData(json_encode(['request' => $encoded]))
            ->post();

        $redir = json_decode($response)->data->instrumentResponse->redirectInfo->url;
        return redirect()->to($redir);
    }

    public function response(Request $request)
    {
        $input = $request->all();
        // $saltKey = getenv("PHONEPE_SALT");
        $saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
        $saltIndex = 1;
        $finalXHeader = hash('sha256','/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'].$saltKey).'###'.$saltIndex;
        
        $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'])
                ->withHeader('Content-Type:application/json')
                ->withHeader('accept:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader)
                ->withHeader('X-MERCHANT-ID:'.$input['transactionId'])
                ->get();

        $response = json_decode($response);   

        if($response->success){
            
            $order = Order::where('id', $request->transactionId)->first();
            if($order==null){
                return redirect("checkout")->with(session()->flash('error', 'Product not found'));
            }
            $useraddr = Address::where('userid', $request->userId)->where('address_status', 2)->first();
            $cartItems = Cart::where('userid', Auth::id())->get();

            $orderitems = [];
            foreach ($cartItems as $cartItem) {
                $orderitems[] = [
                    "name" => $cartItem->products->product_name,
                    "sku" => $cartItem->productid,
                    "selling_price" => $cartItem->products->price,
                    "units" => $cartItem->quantity
                ];
            }

            $orderDetails = [
                "order_id" => $order->id,
                "order_date" => date('Y-m-d'),
                "pickup_location" => "Veerco_Primary",
                "channel_id" => "",
                "comment" => "",
                "billing_customer_name" => $useraddr->fname . " " . $useraddr->lname,
                "billing_last_name" => $useraddr->lname,
                "billing_address" => $useraddr->locationName,
                "billing_address_2" => "",
                "billing_city" => $useraddr->city,
                "billing_pincode" => $useraddr->pincode,
                "billing_state" => $useraddr->state,
                "billing_country" => $useraddr->country,
                "billing_email" => $useraddr->email,
                "billing_phone" => $useraddr->mobile,
                "shipping_is_billing" => true,
                "shipping_customer_name" => "",
                "shipping_last_name" => "",
                "shipping_address" => "",
                "shipping_address_2" => "",
                "shipping_city" => "",
                "shipping_pincode" => "",
                "shipping_country" => "",
                "shipping_state" => "",
                "shipping_email" => "",
                "shipping_phone" => "",
                "order_items" => $orderitems,
                "payment_method" => "Prepaid",
                "shipping_charges" => 0,
                "giftwrap_charges" => 0,
                "transaction_charges" => 0,
                "total_discount" => 0,
                "sub_total" => $request->amount,
                "length" => 1,
                "breadth" => 1,
                "height" => 1,
                "weight" => 1
            ];

            $shiprocketOrder = Shiprocket::order($request->shiprocketToken)->create($orderDetails);
            $shiprocketOrder = json_decode($shiprocketOrder);
            if ($shiprocketOrder->status_code == 1) {
                $order->id = $shiprocketOrder->order_id;
                $order->save();
            } else {
                return redirect()->back()->with(session()->flash('error', $shiprocketOrder->message));
            }


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


        }
        else{
            Order::where('id', $request->transactionId)->delete();
            return redirect("checkout")->with(session()->flash('error', 'Payment declined due to some error'));
        }
    }
}
