<?php
namespace App\Logs;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuditLogger
{
    protected $looked = 'looked to';
    protected $edited = 'edited';
    protected $updated = 'updated';
    protected $deleted = 'deleted';

    public function showModel($model, $action)
    {
        $admin = Auth::user()->getFullName();

        Log::info("Action performed $action $model by Admin:$admin ");
    }


}
