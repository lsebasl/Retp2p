<?php

namespace App\Console\Commands;

use App\PaymentAttempt;
use Carbon\Carbon;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Console\Command;

class UpdateStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update a status when a invoice change its status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param PlacetoPay $placetopay
     * @return void
     */
    public function handle(PlacetoPay $placetopay)
    {
        $createdAt = Carbon::now()->subMinutes('7');

        $pending = PaymentAttempt::where('created_at' , '<=', $createdAt)->where('status','PENDING')->get();

        $pending->each(function(PaymentAttempt $paymentAttempt)use($placetopay){

            $response = $placetopay->query($paymentAttempt->requestId);

            $paymentAttempt->update([
                'status' => $response->status()->status(),
            ]);
        });

    }
}
