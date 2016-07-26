<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectMilestone extends Model
{
    protected $fillable = ['name', 'start_date', 'end_date'];

    public function project()
    {
        return $this->belongsTo('App\Model\Project', 'project_id');
    }
}
