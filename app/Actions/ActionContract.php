<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface ActionContract
{
    /**
     * @param Model $model
     * @param Request $request
     * @return mixed
     */
    public function execute(Model $model, Request $request):Model;
}
