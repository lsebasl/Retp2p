<?php

namespace App\Repositories;

class ModelRepository
{

    /**
     * @param  $model
     * @return mixed
     */
    public function getPaginated($model)
    {
        return $model::orderBy('created_at', 'DESC')->paginate();
    }

    /**
     * @param  $model
     * @return mixed
     */
    public function cacheFindByModel($model)
    {
        return $model;
    }

    /**
     * @param  $request
     * @param  $model
     * @return mixed
     */
    public function update($request, $model)
    {
        return $model->update($request->validated());
    }

    /**
     * @param  $model
     * @return mixed
     */
    public function delete($model)
    {
        return $model->delete();
    }
}
