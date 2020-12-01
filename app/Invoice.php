<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
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
        return $this->belongsToMany(Product::class)->withPivot('product_id', 'quantity');
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
     * @param  SplObserver $observer
     * @return void
     */
    public function attach(\SplObserver $observer):void
    {
        $this->observers[] = $observer;
    }


    /**
     * Delete observer to the model
     *
     * @param  SplObserver $observer
     * @return void
     */
    public function detach(\SplObserver $observer):void
    {
        $key = array_search($observer, $this->observers, true);
        if($key) {
            unset($this->observers[$key]);
        }
    }

    /**
     * Notify to observer for generate an update
     *
     * @return void
     */
    public function notify():void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * Scope to filter invoices by expedition date
     *
     * @param Builder $query
     * @param string|null $initialDate
     * @param string|null $finalDate
     * @return Builder|Builder
     */
    public function scopeCreatedDate(Builder $query, ?string $initialDate,?string $finalDate)
    {
        $initialDate = Carbon::parse($initialDate);

        $finalDate = Carbon::parse($finalDate);

        if ($initialDate && $finalDate) {
            return $query->whereBetween('created_at',[$initialDate,$finalDate]);
        }

        return $query;
    }

    /**
     * Query Scope Status.
     *
     * @param  Builder     $query
     * @param  string|null $status
     * @return Builder
     */
    public function scopeStatus(Builder $query, ? string $status):Builder
    {
        if (null !== $status) {
            return $query->where('status', $status);
        }
        return $query;
    }

    public function scopeMark(Builder$query, ? string $mark):Builder
    {

        if (null !== $mark) {
            return $query->where('mark', 'LIKE', "$mark%");
        }
        return $query;
    }
}
