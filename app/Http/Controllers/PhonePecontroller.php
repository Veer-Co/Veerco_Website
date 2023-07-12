<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class PhonePecontroller extends Controller
{
    public function phonePe(Request $request)
    {
        $payload = [
            'merchantId' => getenv("PHONEPE_MERCHANTID"),
            'merchantTransactionId' => $request->transactionId,
            'merchantUserId' => $request->userId,
            'amount' => $request->amount,
            'redirectUrl' => route('response'),
            'redirectMode' => 'POST',
            'callbackUrl' => route('response'),
            'mobileNumber' => $request->mobileNumber,
            'paymentInstrument' => [
                'type' => 'PAY_PAGE'
            ],
        ];

        $encoded = base64_encode(json_encode($payload));
        // $saltKey = "099eb0cd-02cf-4e2a-8aca-3e6c6aff0399"; // sample salt key
        $saltKey = getenv("PHONEPE_SALT");
        $saltIndex = "1"; // sample salt index

        $string = $encoded . "/pg/v1/pay" . $saltKey;
        $hash = hash("sha256", $string);

        $finalXheader = $hash . "###" . $saltIndex;

        $response = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/pay')
            ->withHeader('Content-Type: application/json')
            ->withHeader('X-VERIFY: '.$finalXheader)
            ->withData(json_encode(['request' => $encoded]))
            ->post();;

        $redir = json_decode($response)->data->instrumentResponse->redirectInfo->url;
        return redirect()->to($redir);
    }

    public function response(Request $request)
    {
        $input = $request->all();

        // $saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399'; // sample salt key
        $saltKey = getenv("PHONEPE_SALT");
        $saltIndex = 1;

        $finalXHeader = hash('sha256','/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'].$saltKey).'###'.$saltIndex;

        $response = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'])
                ->withHeader('Content-Type:application/json')
                ->withHeader('accept:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader)
                ->withHeader('X-MERCHANT-ID:'.$input['transactionId'])
                ->get();

        dd(json_decode($response));
    }
}
