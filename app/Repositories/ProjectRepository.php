<?php

namespace App\Repositories;

use App\Model\Project;
use DB;


class ProjectRepository
{

    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    public function createNew(array $attributes)
    {
        $model                  = new Project();
        $model->name            = $attributes['name'];
        $model->client_id       = $attributes['client_id'];
        $model->scope           = $attributes['scope'];
        $model->description     = $attributes['description'];
        $model->bahasa_prog     = $attributes['bahasa_prog'];
        $model->database        = $attributes['database'];
        $model->other           = $attributes['other'];
        $model->save();

        return $model;
    }

    public function updateOld(Project $model, array $attributes)
    {
        $model->name            = $attributes['name'];
        $model->client_id       = $attributes['client_id'];
        $model->scope           = $attributes['scope'];
        $model->description     = $attributes['description'];
        $model->bahasa_prog     = $attributes['bahasa_prog'];
        $model->database        = $attributes['database'];
        $model->other           = $attributes['other'];
        $model->save();

        return $model;
    }
}
