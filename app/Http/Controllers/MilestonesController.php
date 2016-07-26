<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\ProjectMilestone;
use App\Repositories\MilestoneRepository;
use App\Http\Requests\MilestoneStore;
use Validator, Redirect;

class MilestonesController extends Controller
{
    public function __construct(MilestoneRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($project_id)
    {
        $items = $this->repository->model->where('project_id', $project_id)->paginate(15);

        return view('milestones.index', compact('project_id', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($project_id)
    {
        return view('milestones.create', compact('project_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(MilestoneStore $request, $project_id)
    {
        $item = $this->repository->createNew($request->all(), $project_id);

        return response()->json(['status' => 'created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $item = ProjectMilestone::find($id);

        return view('milestones.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $project_id, $id)
    {
        $milestone_store = ProjectMilestone::find($id);

        $item = $this->repository->updateOld($milestone_store, $request->all());

        return Redirect::route('project.milestone.edit', ['project_id' => $project_id, 'id' => $item->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $milestones = ProjectMilestone::findOrFail($id);

        $milestones->delete();

        return Redirect::route('project.show', ['project_id' => $milestones->project_id]);
    }
}
