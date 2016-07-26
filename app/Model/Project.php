<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Project extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $fillable = ['name', 'scope', 'bahasa_prog', 'database', 'server', 'other', 'description'];

    protected $sluggable = [
        'build_from' => ['client.client_name', 'name'],
        'save_to'    => 'slug',
    ];

    public function client()
    {
    	return $this->belongsTo('App\Model\Client', 'client_id');
    }

    public function milestones()
    {
        return $this->hasMany('App\Model\ProjectMilestone', 'project_id');
    }
}
