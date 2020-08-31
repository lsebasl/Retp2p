<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Invoice;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class InvoiceController extends Controller
{


    public function __construct(PaymentAttemptController $paymentAttempt)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $invoices = Invoice::orderBy('created_at', request('sorted', 'DESC'))->paginate(20);

        return view('invoices.index', ['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return RedirectResponse
     */
    public function create():RedirectResponse
    {
        $userId = Auth::user()->id;

        $creationDate = Carbon::now();

        $expirationDate = $creationDate->addMonth();

        $details = Cart::where('user_id',$userId)->get();

        $subtotal = Cart::where('user_id',$userId)->sum('subtotal');

        $vat = $subtotal *0.19;

        $total = $subtotal + $vat;

        $invoice = Invoice::create([
            'users_id' => $userId,
            'expedition_date' => $creationDate,
            'expiration_date' => $expirationDate,
            'subtotal' => $subtotal,
            'Vat' => $vat,
            'total' => $total,

        ]);

         foreach ($details as $detail){

            $productId = $detail->product_id;
            $quantity = $detail->quantity;
            $invoice->products()->attach($productId,[
                'product_id' =>$productId,
                'quantity' => $quantity,
            ]);

         };

        Cart::truncate();

         return redirect(route('payment.attempt'))->with('success','The Invoice has Been Created Click On Place Order to continue');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
