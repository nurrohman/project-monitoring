<?php

namespace App\Repositories;

use App\Model\ProjectToUser;
use DB;


class ProjectToUserRepository
{

    public function __construct(ProjectToUser $model)
    {
        $this->model = $model;
    }

    public function getByProjectId($project_id)
    {
        $model = $this->model->where('project_id', $project_id);

        return $model->paginate();
    }

    public function createNew(array $attributes, $project_id)
    {
        $model              = new ProjectToUser();
        $model->project_id  = $project_id;
        $model->employee_id = $attributes['employee_id'];
        $model->user_role   = $attributes['user_role'];
        $model->save();

        return $model;
    }

    public function updateOld(ProjectToUser $model, array $attributes)
    {
        return $model;
    }
}
