<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

abstract class Action implements ActionContract
{
    /**
     * @param Model $model
     * @param Request $request
     * @return Model|mixed
     */
    public function execute(Model $model, Request $request):Model
    {
        return $this->storeModel($model, $request);
    }

    abstract public function storeModel(Model $model, Request $data): Model;
}
