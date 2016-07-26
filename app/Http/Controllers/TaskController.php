<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\TaskRepository;
use App\Http\Requests\TaskStore;

class TaskController extends Controller
{
    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($feature_id)
    {
        $items = $this->repository->model->where('feature_id', $feature_id)->paginate();

        return view('task.index', compact('items', 'feature_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($feature_id)
    {
        return view('task.create', compact('feature_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskStore $request, $feature_id)
    {
        $item = $this->repository->createNew($request->all(), $feature_id);

        return redirect()->route('project.task.edit', ['id' => $item->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->repository->model->find($id);

        return view('task.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task_store = $this->repository->model->find($id);

        $item = $this->repository->updateOld($task_store, $request->all());

        return redirect()->route('project.task.edit', ['id' => $item->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $task = $this->repository->model->find($id);

            $task->delete();

            return redirect()->route('project.task.index', $task->feature_id);

        } catch (\Exception $e) {
            $this->command->error($e->getMessage());
        }
    }
}
