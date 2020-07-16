<?php

namespace App\Repositories;
class ModelRepository
{

    public function getPaginated($model)
    {
        return $model::orderBy('created_at', 'DESC')->paginate();
    }

    public function cacheFindByModel($model)
    {
        return $model;
    }

    public function update($request,$model)
    {
        return $model->update($request->validated());
    }

    public function delete($model)
    {
        return $model->delete();
    }

}
