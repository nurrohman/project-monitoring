<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\ProjectMilestone;
use App\Model\Backlog;
use App\Model\Project;
use Validator, Redirect, Input;

class PlanningsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($project_id)
    {
        $project = Project::findOrFail($project_id);
        $milestone = ProjectMilestone::where('project_id', $project_id)->lists('name', 'id');
        $backlog   = Backlog::where('project_id', $project_id)->lists('name', 'id');

        $ismailstones = $project->milestones->where('status', 1)->first();

        $mailstone_id = 0;
        $backlogavaliabe = false;
        if($ismailstones)
        {
            $mailstone_id = $ismailstones->id;
            $backlogavaliabe = Backlog::where('project_id', $project_id)->where('milestone_id', $mailstone_id)->get();
        }

        return view('planning.form', compact('plannings', 'backlogavaliabe', 'project', 'milestone', 'mailstone_id', 'backlog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, $project_id)
    {
        $input = Input::all();
        $validation = Validator::make($request->all(), [
            'milestone_id' => 'required',
        ]);

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation->errors());
        }

        ProjectMilestone::where('project_id', $project_id)->update(array('status'=> 0));

        $mailstone = ProjectMilestone::find($input['milestone_id']);
        $mailstone->status = 1;
        $mailstone->save();

        foreach ($request->backlog_id as $key => $value) {
            $backlog = app('App\Model\Backlog')->find($value);
            $backlog->milestone_id = $input['milestone_id'];
            $backlog->start_date = $input['start_date'][$key];
            $backlog->due_date = $input['due_date'][$key];
            $backlog->mandays = $input['mandays'][$key];
            $backlog->save();
        }

        return Redirect::route('project.planning.create', ['id' => $project_id]);
    }
}
