<?php

namespace App\Repositories;

use App\Model\Feature;
use Carbon\Carbon;
use DB;


class FeatureRepository
{
    public function __construct(Feature $model)
    {
        $this->model = $model;
    }

    public function createNew(array $attributes, $milestone_id)
    {
        $model                  = new Feature();
        $model->milestone_id    = $milestone_id;
        $model->name            = $attributes['name'];
        $model->due_date        = Carbon::parse($attributes['due_date'])->format('Y-m-d');
        $model->status          = $attributes['status'];
        $model->save();

        return $model;
    }

    public function updateOld(Feature $model, array $attributes)
    {
        $model->name        = $attributes['name'];
        $model->due_date    = Carbon::parse($attributes['due_date'])->format('Y-m-d');
        $model->status      = $attributes['status'];
        $model->save();

        return $model;
    }
}
