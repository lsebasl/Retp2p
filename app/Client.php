<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
        protected $fillable = [
            'name',
            'last_name',
            'id_type',
            'identification',
            'phone',
            'email',
            'address',
        ];

    /**
     * Client has many invoices.
     *
     * @return HasMany
     */
    public function invoices():hasmany
        {
            return $this->hasMany(Invoice::class);
        }

    /**
     * Obtain complete name in a user.
     *
     * @return string|null
     */
    public function getFullName():?string
        {
            return ucfirst($this->name) . ' ' . ucfirst($this->last_name);
        }
}
