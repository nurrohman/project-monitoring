<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectToUser extends Model
{
    protected $fillable = ['project_id', 'employee_id', 'role_id'];

    public function project()
    {
        return $this->belongsTo('App\Model\Project', 'project_id');
    }

    public function role()
    {
        return $this->belongsTo('App\Model\Role', 'user_role');
    }

    public function employee()
    {
        return $this->belongsTo('App\Model\Employee', 'employee_id');
    }
}
