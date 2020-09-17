<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use SplObserver;

class Invoice extends Model implements \SplSubject
{
    private $observers = [];

    protected $fillable = [
        'users_id',
        'expedition_date',
        'expiration_date',
        'subtotal',
        'Vat',
        'total',
        'product_id',
        'quantity',
        'status'
    ];

    /**
     * Many products has many invoices.
     *
     * @return BelongsToMany
     */
    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('product_id','quantity');
    }

    /**
     * Relationship many invoices belong to client.
     *
     * @return BelongsTo
     */
    public function clients():BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Relationship many invoices belong to user.
     *
     * @return BelongsTo
     */
    public function users():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation between invoices and Payment Attempts
     *
     * @return BelongsToMany
     */
    public function PaymentAttempt():BelongsToMany
    {
        return $this->belongsToMany(PaymentAttempt::class)->withPivot('requestId', 'processUrl', 'status');
    }

    /**
     * Add observer to the model
     *
     * @param SplObserver $observer
     * @return array
     */
    public function attach(\SplObserver $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * @param SplObserver $observer
     */
    public function detach(\SplObserver $observer)
    {
        $key = array_search($observer,$this->observers, true);
        if($key){
            unset($this->observers[$key]);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer)
            $observer->update($this);
    }
}
