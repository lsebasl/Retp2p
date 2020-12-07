<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Logs
{
    /**
     * @param  $model
     * @param  $action
     * @return void
     */
    public static function AuditLogger($model, $action):void
    {
        $admin = Auth::user()->getFullName();

        Log::info("Action performed $action $model by Admin:$admin");
    }

    /**
     * @param  $message
     * @param  array $options
     * @return void
     */
    public static function errorLogger($message,$options=[]):void
    {
        Log::error("Action fail in $message", $options);
    }

}
