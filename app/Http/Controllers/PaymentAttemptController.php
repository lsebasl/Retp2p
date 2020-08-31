<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\PaymentAttempt;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PaymentAttemptController extends Controller
{
    /**
     * Show the about us in the store.
     *
     * @param PlacetoPay $placetopay
     * @return View
     */
    public function history(PlacetoPay $placetopay):View
    {
        $paymentAttempt = PaymentAttempt::with(['invoice'=>function ($query) {
            $user = Auth::user()->id;
            $query->where('users_id', $user);
        }])->get()->last();

        $response = $placetopay->query($paymentAttempt->requestId);

        $paymentAttempt->update([
            'status' => $response->status()->status(),
        ]);

        $paymentAttempt->save();


        $paymentAttempts = PaymentAttempt::with(['invoice'=>function ($query) {
            $user = Auth::user()->id;
            $query->where('users_id', $user);
        }])->orderBy('created_at', request('sorted', 'DESC'))->get();


        return view('store.history',['paymentAttempts' => $paymentAttempts]);

    }
    public function show(Invoice $invoice,PaymentAttempt $paymentAttempt, PlacetoPay $placetopay)

    {
        $response = $placetopay->query('366493');

        $paymentAttempt->update([
            'status' => $response->status()->status(),
        ]);
        if ($paymentAttempt->status == 'APPROVED') {
            $invoice->update([
                'paid_at' => Carbon::now(),
                ''
            ]);

        }
        return view("invoices.payments.show", [
            'invoice' => $invoice,
            'paymentAttempt' => $paymentAttempt,
            'response' => $response
        ]);
    }


    public function paymentAttempt(Request $request, PlacetoPay $placeToPay)
    {
        $user = Auth::user()->id;

        $invoice = Invoice::where('users_id',$user)->get()->last();

        $reference = $invoice->id;

        $requestP = [
            "locale" => "es_CO",
            "buyer" => [
                "name" => $invoice->users->name,
                "surname" => $invoice->users->last_name,
                "email" => $invoice->users->email,
                "documentType" => $invoice->users->id_type,
                "document" => $invoice->users->identification,
                "mobile" => $invoice->users->phone,
                "address" => [
                    "street" => $invoice->users->address,
                ]
            ],

            'payment' => [
                'reference' => strval($reference),
                'amount' => [
                    'currency' => 'COP',
                    'total' =>$invoice->total,
                ],
            ],
            'expiration' => date('c', strtotime('+1 hour')),
            'returnUrl' => route('payment.history'),//route('payment.callback', $invoice),
            'ipAddress' => $request->ip(),
            'userAgent' => $request->header('User-Agent'),
        ];

        //store new instance of model PaymentAttemptController
        $response = $placeToPay->request($requestP);

        //dd($response);

        $paymentAttempt = new \App\PaymentAttempt;
        $paymentAttempt->invoice_id = $invoice->id;
        $paymentAttempt->requestId = $response->requestId();
        $paymentAttempt->processUrl = $response->processUrl();
        $paymentAttempt->status = 'pending';
        $paymentAttempt->save();

        if ($response->isSuccessful()) {

            $paymentAttempt->update([
                'status' => $response->status()->status(),
            ]);

            return redirect()->away($response->processUrl());
        } else {
            $response->status()->message();
        }

     }
}
