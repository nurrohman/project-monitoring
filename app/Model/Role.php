<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role'];

    public function user()
    {
    	return $this->belongsToMany('App\Model\User', 'project_to_users','user_role','user_id');
    }
}
