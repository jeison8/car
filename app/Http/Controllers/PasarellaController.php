<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InsertShippingInfoRequest;

class PasarellaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function InsertshippingInfo(InsertShippingInfoRequest $request, User $user)
    {       
        // $request->insertShippingInfo($user);

        dd($request);
        // $secretKey = '024h1IlD';
        $url = 'https://test.placetopay.com/redirection/';

        $placetopay = new PlacetoPay([
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => '024h1IlD',
            'url' => $url,
        ]);



        // $data = [
        //     'locale' => 'es_CO',
        //     'payer' => [
        //         'name' => $request->name,
        //         'surname' => 'Yost',
        //         'email' => $request->email,
        //         'documentType' => 'CC',
        //         'document' => '1848839248',
        //         'mobile' => '3006108300',
        //         'address' => [
        //             'street' => '703 Dicki Island Apt. 609',
        //             'city' => 'North Randallstad',
        //             'state' => 'Antioquia',
        //             'postalCode' => '46292',
        //             'country' => 'US',
        //             'phone' => '363-547-1441 x383',
        //         ],
        //     ],
        //     'buyer' => [
        //         'name' => 'Kellie Gerhold',
        //         'surname' => 'Yost',
        //         'email' => 'flowe@anderson.com',
        //         'documentType' => 'CC',
        //         'document' => '1848839248',
        //         'mobile' => '3006108300',
        //         'address' => [
        //             'street' => '703 Dicki Island Apt. 609',
        //             'city' => 'North Randallstad',
        //             'state' => 'Antioquia',
        //             'postalCode' => '46292',
        //             'country' => 'US',
        //             'phone' => '363-547-1441 x383',
        //         ],
        //     ],
        //     'payment' => [
        //         'reference' => $reference,
        //         'description' => 'Iusto sit et voluptatem.',
        //         'amount' => [
        //             'taxes' => [
        //                 [
        //                     'kind' => 'ice',
        //                     'amount' => 56.4,
        //                     'base' => 470,
        //                 ],
        //                 [
        //                     'kind' => 'valueAddedTax',
        //                     'amount' => 89.3,
        //                     'base' => 470,
        //                 ],
        //             ],
        //             'details' => [
        //                 [
        //                     'kind' => 'shipping',
        //                     'amount' => 47,
        //                 ],
        //                 [
        //                     'kind' => 'tip',
        //                     'amount' => 47,
        //                 ],
        //                 [
        //                     'kind' => 'subtotal',
        //                     'amount' => 940,
        //                 ],
        //             ],
        //             'currency' => 'USD',
        //             'total' => 1076.3,
        //         ],
        //         'items' => [
        //             [
        //                 'sku' => 26443,
        //                 'name' => 'Qui voluptatem excepturi.',
        //                 'category' => 'physical',
        //                 'qty' => 1,
        //                 'price' => 940,
        //                 'tax' => 89.3,
        //             ],
        //         ],
        //         'shipping' => [
        //             'name' => 'Kellie Gerhold',
        //             'surname' => 'Yost',
        //             'email' => 'flowe@anderson.com',
        //             'documentType' => 'CC',
        //             'document' => '1848839248',
        //             'mobile' => '3006108300',
        //             'address' => [
        //                 'street' => '703 Dicki Island Apt. 609',
        //                 'city' => 'North Randallstad',
        //                 'state' => 'Antioquia',
        //                 'postalCode' => '46292',
        //                 'country' => 'US',
        //                 'phone' => '363-547-1441 x383',
        //             ],
        //         ],
        //         'allowPartial' => false,
        //     ],
        //     'expiration' => date('c', strtotime('+1 hour')),
        //     'ipAddress' => '127.0.0.1',
        //     'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36',
        //     'returnUrl' => 'http://dnetix.dev/p2p/client',
        //     'cancelUrl' => 'https://dnetix.co',
        //     'skipResult' => false,
        //     'noBuyerFill' => false,
        //     'captureAddress' => false,
        //     'paymentMethod' => null,
        // ];

        // try {
        //     $placetopay = placetopay();
        //     $response = $placetopay->request($data);

        //     if ($response->isSuccessful()) {
        //         // Redirect the client to the processUrl or display it on the JS extension
        //         // $response->processUrl();
        //     } else {
        //         // There was some error so check the message
        //         // $response->status()->message();
        //     }
        //     var_dump($response);
        // } catch (Exception $e) {
        //     var_dump($e->getMessage());
        // }









        $returnUrl = config('app.url');
        $reference = 'REFERENCE_'.time();
        $data = [
            'payment' => [
                'reference' => $reference,
                'description' => 'Testing payment',
                'amount' => [
                    'currency' => 'COP',
                    'total' => 120000,
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => $returnUrl.'/shipping-response?reference='.$reference,
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];

        $response = $placetopay->request($data);

            if ($response->isSuccessful()) {
                $requestId = $response->requestId();
                $processUrl = $response->processUrl(); //on your DB associated with the payment order

                header('Location:'.$response->processUrl());
                
                exit;

            } else {
                $response->status()->message();
            }
        
        // return view('shippingInfo');
    }



    public function ShippingResponse()
    {

        dd($_GET['reference']);

    }

}
