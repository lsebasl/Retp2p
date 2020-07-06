<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Logs
{
    public static function AuditLogger($model, $action)
    {
        $admin = Auth::user()->getFullName();

        Log::info("Action performed $action $model by Admin:$admin");
    }
}
