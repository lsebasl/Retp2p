<?php

use Illuminate\Database\Seeder;
use App\Invoice;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Invoice::class, 40)->create();

        foreach (App\Invoice::all() as $invoice) {
            foreach (App\Product::all() as $product) {

                if (rand(1, 100) > 40) {
                    $invoice->products()->attach(
                        $product->id,[
                        'product_id' => $product->id,
                        'quantity' => 1,
                        'total_by_product' => ($product->price * rand(1,100)),
                        ]);
                }
            }
            $invoice->save();
        }
    }
}
