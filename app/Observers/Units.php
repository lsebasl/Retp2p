<?php

namespace App\Observers;

use App\Events\LogInvoiceEvent;
use App\Mail\SendNotificationStock;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use SplSubject;

class Units implements \SplObserver

{

    /**
     *Updates available units in inventory
     *
     * @param SplSubject $subject
     */
    public function update(SplSubject $subject):void
    {

        $invoice = $subject->products;

        $invoice->each(function ($product){

            $newQuantity  = $product->units - $product->pivot->quantity;

            $product = Product::where('id',$product->id)->first();

            $product->update(['units' => $newQuantity]);

            $details = [
                'product_id' => $product->id,
                'product_name' => $product->name
            ];

            if ($newQuantity <= '10'){

                event(new LogInvoiceEvent(
                    'alert',
                    'there are less than 10 units in inventory',
                    $details
                ));

                Mail::to(config('mail.to.stock'))->send(new SendNotificationStock($details));
            }

        });
    }
}
