<?php

namespace App\Repositories;

use App\Model\Task;
use DB;


class TaskRepository
{
    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    public function createNew(array $attributes, $feature_id)
    {

        $model                  = new Task();
        $model->feature_id      = $feature_id;
        $model->name            = $attributes['name'];
        $model->save();

        return $model;
    }

    public function updateOld(Task $model, array $attributes)
    {
        $model->name            = $attributes['name'];
        $model->status          = $attributes['status'];
        $model->save();

        return $model;
    }
}
