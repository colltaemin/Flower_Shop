<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function vnpay_payment(Request $request): void
    {
        $code_cart = random_int(100000, 999999);
        $vnp_Url = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html';
        $vnp_Returnurl = 'https://localhost/vnpay_php/vnpay_return.php';
        $vnp_TmnCode = 'RYMV771B'; // Mã website tại VNPAY
        $vnp_HashSecret = 'XTLAOKHCKMUBMPEICOJCTSHGHSYMQSIW'; // Chuỗi bí mật

        $vnp_TxnRef = time(); // Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán hóa đơn VNPay';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = 20000 * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        // Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        // Billing

        $inputData = [
            'vnp_Version' => '2.1.0',
            'vnp_TmnCode' => $vnp_TmnCode,
            'vnp_Amount' => $vnp_Amount,
            'vnp_Command' => 'pay',
            'vnp_CreateDate' => date('YmdHis'),
            'vnp_CurrCode' => 'VND',
            'vnp_IpAddr' => $vnp_IpAddr,
            'vnp_Locale' => $vnp_Locale,
            'vnp_OrderInfo' => $vnp_OrderInfo,
            'vnp_OrderType' => $vnp_OrderType,
            'vnp_ReturnUrl' => $vnp_Returnurl,
            'vnp_TxnRef' => $vnp_TxnRef,
        ];

        if (isset($vnp_BankCode) && '' !== $vnp_BankCode) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && '' !== $vnp_Bill_State) {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        // var_dump($inputData);
        ksort($inputData);
        $query = '';
        $i = 0;
        $hashdata = '';
        foreach ($inputData as $key => $value) {
            if (1 === $i) {
                $hashdata .= '&'.urlencode($key).'='.urlencode($value);
            } else {
                $hashdata .= urlencode($key).'='.urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key).'='.urlencode($value).'&';
        }

        $vnp_Url = $vnp_Url.'?'.$query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash='.$vnpSecureHash;
        }
        $returnData = ['code' => '00', 'message' => 'success', 'data' => $vnp_Url];
        if (isset($_POST['redirect'])) {
            header('Location: '.$vnp_Url);

            exit;
        }
        echo json_encode($returnData);
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            [
                'Content-Type: application/json',
                'Content-Length: '.\strlen($data), ]
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        // execute post
        $result = curl_exec($ch);
        // close connection
        curl_close($ch);

        return $result;
    }

    public function momo_payment(Request $request)
    {
        $endpoint = 'https://test-payment.momo.vn/v2/gateway/api/create';

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = 'Thanh toán qua MoMo';
        $amount = 20000;
        $orderId = time().'';
        $redirectUrl = 'http://localhost:8000/momoCheck';

        $ipnUrl = 'https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b';
        $extraData = '';

        $requestId = time().'';
        $requestType = 'payWithATM';

        // before sign HMAC SHA256 signature
        $rawHash = 'accessKey='.$accessKey.'&amount='.$amount.'&extraData='.$extraData.'&ipnUrl='.$ipnUrl.'&orderId='.$orderId.'&orderInfo='.$orderInfo.'&partnerCode='.$partnerCode.'&redirectUrl='.$redirectUrl.'&requestId='.$requestId.'&requestType='.$requestType;

        $signature = hash_hmac('sha256', $rawHash, $secretKey);

        $data = ['partnerCode' => $partnerCode,
            'partnerName' => 'Test',
            'storeId' => 'MomoTestStore',
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature, ];
        $result = $this->execPostRequest($endpoint, json_encode($data));

        $jsonResult = json_decode($result, true);  // decode json

        // Just a example, please check more in there

        return redirect()->to($jsonResult['payUrl']);
    }
}
