<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class ModelRepository
{

    /**
     * @param  $model
     * @return LengthAwarePaginator
     */
    public function getPaginated($model):LengthAwarePaginator
    {
        return $model::orderBy('created_at', 'DESC')->paginate();
    }

    /**
     * @param  $model
     * @return Model
     */
    public function cacheFindByModel($model):Model
    {
        return $model;
    }

    /**
     * @param  $request
     * @param  $model
     * @return bool
     */
    public function update($request, $model):bool
    {
        return $model->update($request->validated());
    }

    /**
     * @param  $model
     * @return bool
     */
    public function delete($model):bool
    {
        return $model->delete();
    }
}
