<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\ProjectToUserRepository;
use App\Http\Requests\ProjectAssignStore;

class ProjectAssignController extends Controller
{
    public function __construct(ProjectToUserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(ProjectAssignStore $request, $project_id)
    {
        $item = $this->repository->createNew($request->all(), $project_id);

        return response()->json(['status' => 'created'], 201);
    }

}
