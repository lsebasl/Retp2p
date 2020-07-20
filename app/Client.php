<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{

    /**
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

        public function invoices()
        {
            return $this->hasMany(Invoice::class);
        }

        public function getFullName()
        {
            return ucfirst($this->name) . ' ' . ucfirst($this->last_name);

        }

}

