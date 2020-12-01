<?php

namespace App\Http\Controllers;

use App\Events\LogInvoiceEvent;
use App\Invoice;
use App\Observers\Units;
use App\PaymentAttempt;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PaymentAttemptController extends Controller
{
    /**
     * Show the about us in the store.
     *
     * @return View
     */
    public function history():View
    {
        $paymentAttempts = PaymentAttempt::with(
            ['invoice'=>function ($query) {
                $user = Auth::user()->id;
                $query->where('users_id', $user);
            }]
        )->orderBy('created_at', request('sorted', 'DESC'))->get();

        return view('store.history', ['paymentAttempts' => $paymentAttempts]);

    }

    /**
     * @param  Request    $request
     * @param  PlacetoPay $placeToPay
     * @throws \Dnetix\Redirection\Exceptions\PlacetoPayException
     */
    public function paymentAttempt(Request $request, PlacetoPay $placeToPay)
    {
        $user = Auth::user()->id;

        $invoice = Invoice::where('users_id', $user)->get()->last();

        if ($invoice->total === 0) {
            event(
                new LogInvoiceEvent(
                    'Error',
                    'Tried to pay without select products',
                    [
                    'invoice id' => $invoice->id,
                    'ip Address' => $request->ip(),
                    'userAgent' => $request->header('User-Agent'),
                    'By User' => Auth::user()->name
                    ]
                )
            );
            return redirect()->route('cart.show', $invoice)->with('error', 'You tried to pay without select products');
        }

        $reference = $invoice->id;

        $requestP = [
            "locale" => "es_CO",
            "buyer" => [
                'name' => $invoice->users->name,
                'surname' => $invoice->users->last_name,
                'email' => $invoice->users->email,
                'documentType' => $invoice->users->id_type,
                'document' => $invoice->users->identification,
                'mobile' => $invoice->users->phone,
                'address' => [
                    'street' => $invoice->users->address,
                ]
            ],

            'payment' => [
                'reference' => strval($reference),
                'amount' => [
                    'currency' => 'COP',
                    'total' => $invoice->total,
                ],
            ],
            'expiration' => date('c', strtotime('+1 hour')),
            'returnUrl' => route('payment.callback'),//route('payment.callback', $invoice),
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

            $paymentAttempt->update(
                [
                'status' => $response->status()->status(),
                ]
            );

            return redirect()->away($response->processUrl());
        }
        event(
            new LogInvoiceEvent(
                'info',
                $response->status()->message(),
                [
                'invoice id' => $invoice->id,
                'ip Address' => $request->ip(),
                'userAgent' => $request->header('User-Agent'),
                'By User' => Auth::user()->name
                ]
            )
        );

    }


    /**
     *
     *
     * @param  PlacetoPay $placetopay
     * @return RedirectResponse
     */
    public function callback(PlacetoPay $placetopay):RedirectResponse
    {

        $paymentAttempt = PaymentAttempt::with(
            ['invoice'=>function ($query) {
                $user = Auth::user()->id;
                $query->where('users_id', $user);
            }]
        )->get()->last();

        $response = $placetopay->query($paymentAttempt->requestId);

        $paymentAttempt->update(
            [
            'status' => $response->status()->status(),
            ]
        );

        $paymentAttempt->save();

        $invoice = Invoice::where('id', $paymentAttempt->invoice_id)->first();

        if ($paymentAttempt->status === 'APPROVED') {
            $invoice->update(
                [
                'status' => 'Paid',

                ]
            );

            $invoice->attach(new Units());

            $invoice->notify();

        }

        if ($paymentAttempt->status === 'REJECTED') {
            $invoice->update(
                [
                'status' => 'Rejected',
                ]
            );
        }

        return redirect(route('payment.history'));

    }

}
