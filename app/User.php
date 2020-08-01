<?php

namespace App;

use http\QueryString;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    const ENABLE_STATUS = 'Enable';
    const DISABLE_STATUS = 'Disable';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name','last_name', 'email', 'password','id_type','identification','phone','address','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *  Get name in a specific user.
     *
     * @return string
     */
    public function getName():string
    {
        return $this->getAttribute('name');
    }

    /**
     * Get last name in a specific user.
     *
     * @return string
     */
    public function getLastName():string
    {
        return $this->getAttribute('last_name');
    }

    /**
     * Get complete name in a specific user.
     *
     * @return string
     */
    public function getFullName():string
    {
        return ucfirst($this->getName()) . ' ' . ucfirst($this->getLastName());
    }

    /**
     * @return HasMany
     */
    public function invoices():HasMany
    {
        return $this->hasMany(Invoice::class);
    }

}
