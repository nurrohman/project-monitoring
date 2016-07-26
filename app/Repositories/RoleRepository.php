<?php

namespace App\Repositories;

use App\Model\Role;
use DB;


class RoleRepository
{
    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function createNew(array $attributes)
    {

        $model                  = new Role();
        $model->role            = $attributes['role'];
        $model->save();

        return $model;
    }

    public function updateOld(Role $model, array $attributes)
    {
        $model->role            = $attributes['role'];
        $model->save();

        return $model;
    }
}
