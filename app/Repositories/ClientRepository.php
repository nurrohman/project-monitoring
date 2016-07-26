<?php

namespace App\Repositories;

use App\Model\Client;
use DB;


class ClientRepository
{
    public function __construct(Client $model)
    {
        $this->model = $model;
    }

    public function createNew(array $attributes)
    {

        $model                  = new Client();
        $model->client_name     = $attributes['client_name'];
        $model->save();

        return $model;
    }

    public function updateOld(Client $model, array $attributes)
    {
        $model->client_name     = $attributes['client_name'];
        $model->save();

        return $model;
    }
}
