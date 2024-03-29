<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;
    use HasApiTokens;


    const ENABLE_STATUS = 'Enable';
    const DISABLE_STATUS = 'Disable';
    const ADMIN_ROLE = 'Admin';
    const USER_ROLE = 'User';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name','last_name', 'email', 'password',
        'id_type','identification','phone',
        'address','status', 'role',
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

    /**
     * @return mixed
     */
    public function authUser()
    {
        return Auth::user()->id;
    }


    /**
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

    /**
     * Scope to filter invoices by expedition date
     *
     * @param Builder     $query
     * @param string|null $initialDate
     * @param string|null $finalDate
     */
    public function scopeCreatedDate(Builder $query, ?string $initialDate, ?string $finalDate)
    {
        $initialDate = Carbon::parse($initialDate);

        $finalDate = Carbon::parse($finalDate);

        if ($initialDate && $finalDate) {
            return $query->whereBetween('created_at', [$initialDate,$finalDate]);
        }

        return $query;
    }

    /**
     * @param  Builder     $query
     * @param  string|null $idType
     * @return Builder
     */
    public function scopeIdType(Builder $query, ? string $idType)
    {
        if (null !== $idType) {
            return $query->where('id_type', $idType);
        }
        return $query;
    }

    /**
     * Query Scope Name.
     *
     * @param  Builder     $query
     * @param  string|null $name
     * @return Builder
     */
    public function scopeName(Builder $query, ? string $name):Builder
    {
        if (null !== $name) {
            return $query->where('name', 'LIKE', "$name%");
        }
        return $query;
    }
}
