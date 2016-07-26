<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $fillable = ['name', 'project_id', 'live_date'];

    public function project()
    {
        return $this->belongsTo('App\Model\Project', 'project_id');
    }
}
