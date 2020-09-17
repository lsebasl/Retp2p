<?php

namespace App\Observers;

use App\Invoice;
use App\Product;
use SplSubject;

class Units implements \SplObserver

{
    public function update(SplSubject $subject)
    {
        $invoice = $subject->products;

        $invoice->each(function ($product){

            $newQuantity  = $product->units - $product->pivot->quantity;

            $product = Product::where('id',$product->id)->first();

            $product->update(['units' => $newQuantity]);
        });
    }
}
