<?php

namespace App\Repositories;

use App\Model\ProjectMilestone;
use DB;
use Carbon\Carbon;


class MilestoneRepository
{
    public function __construct(ProjectMilestone $model)
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
        DB::beginTransaction();

        $milestone              = new ProjectMilestone;
        $milestone->name        = $attributes['name'];
        $milestone->project_id  = $project_id;
        $milestone->start_date  = Carbon::parse($attributes['start_date'])->format('Y-m-d');
        $milestone->end_date    = Carbon::parse($attributes['end_date'])->format('Y-m-d');

        $milestone->save();

        DB::commit();

        return $milestone;
    }

    public function updateOld(ProjectMilestone $model, array $attributes)
    {
        $model->name     = $attributes['name'];
        $model->save();

        return $model;
    }
}
