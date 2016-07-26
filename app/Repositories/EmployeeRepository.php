<?php

namespace App\Repositories;

use App\Model\Employee;
use Carbon\Carbon;
use DB;


class EmployeeRepository
{
    public function __construct(Employee $model)
    {
        $this->model = $model;
    }

    public function createNew(array $attributes)
    {

        $model                  = new Employee();
        $model->nip             = $attributes['nip'];
        $model->name            = $attributes['name'];
        $model->npwp            = $attributes['npwp'];
        $model->field_of_study  = $attributes['field_of_study'];
        $model->email           = $attributes['email'];
        $model->birthdate       = Carbon::parse($attributes['birthdate'])->format('Y-m-d');
        $model->birthplace      = $attributes['birthplace'];
        $model->phone           = $attributes['phone'];
        $model->save();

        return $model;
    }

    public function updateOld(Employee $model, array $attributes)
    {
        $model->nip             = $attributes['nip'];
        $model->name            = $attributes['name'];
        $model->npwp            = $attributes['npwp'];
        $model->field_of_study  = $attributes['field_of_study'];
        $model->email           = $attributes['email'];
        $model->birthdate       = Carbon::parse($attributes['birthdate'])->format('Y-m-d');
        $model->birthplace      = $attributes['birthplace'];
        $model->phone           = $attributes['phone'];
        $model->save();

        return $model;
    }
}
