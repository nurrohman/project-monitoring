<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\Project;
use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectToUserRepository;
use App\Repositories\MilestoneRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\RoleRepository;
use App\Http\Requests\ProjectStore;

class ProjectController extends Controller
{
    /**
     * @var ProjectRepository
     */
    protected $repository;

    public function __construct(ProjectRepository $repository,
                                ProjectToUserRepository $assign_repository,
                                MilestoneRepository $milestone_repository)
    {
        $this->repository           = $repository;
        $this->assign_repository    = $assign_repository;
        $this->milestone_repository = $milestone_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = $this->repository->model->with('client')->paginate();

        return view('project.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $client = Client::lists('client_name', 'id');

        return view('project.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ProjectStore $request)
    {
        $item = $this->repository->createNew($request->all());

        return Redirect::route('project.edit', ['id' => $item->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $item = $this->repository->model->findBySlug($slug);

        $project_assign = $this->assign_repository->getByProjectId($item->id);
        $milestones     = $this->milestone_repository->getByProjectId($item->id);

        $employee = app(EmployeeRepository::class)->model->lists('name', 'id');
        $role     = app(RoleRepository::class)->model->lists('role', 'id');

        return view('project.show', compact('item', 'project_assign', 'milestones', 'employee', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $item   = Project::find($id);
        $client = Client::lists('client_name', 'id');

        return view('project.edit', compact('item', 'client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $item = $this->repository->updateOld($project, $request->all());

        return Redirect::route('project.edit', ['id' => $item->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        $project->delete();

        return Redirect::route('project.index');
    }
}
