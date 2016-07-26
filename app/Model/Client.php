<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Client extends Model implements SluggableInterface
{

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'client_name',
        'save_to'    => 'slug',
    ];

    protected $fillable = ['client_name'];

    public function projects()
    {
        return $this->hasMany('App\Model\Project', 'client_id');
    }
}
