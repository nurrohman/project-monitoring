<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\FeatureRepository;
use App\Http\Requests\FeatureStore;
use Symfony\Component\VarDumper\Caster\ExceptionCaster;

class FeatureController extends Controller
{
    /**
     * @var Project
     */
    protected $repository;

    public function __construct(FeatureRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex($milestone_id)
    {
        $items = $this->repository->model->where('milestone_id', $milestone_id)->paginate();

        return view('feature.index', compact('items', 'milestone_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($milestone_id)
    {
        return view('feature.create', compact('milestone_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureStore $request, $milestone_id)
    {
        $item = $this->repository->createNew($request->all(), $milestone_id);

        return redirect()->route('project.feature.edit', ['id' => $item->id]);
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

        return view('feature.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureStore $request, $id)
    {
        $feature_store = $this->repository->model->find($id);

        $item = $this->repository->updateOld($feature_store, $request->all());

        return redirect()->route('project.feature.edit', ['id' => $item->id]);
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
            $feature = $this->repository->model->find($id);

            $feature->delete();

            return redirect()->route('project.feature.index', $feature->milestone_id);

        } catch (\Exception $e) {
            $this->command->error($e->getMessage());
        }
    }
}
