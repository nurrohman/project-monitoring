<?php

namespace App\Http\Controllers;

use App\Repositories\RoleRepository;
use App\Http\Requests\Masterdata\RoleStore;

class RoleController extends Controller
{
    /**
     * @var Project
     */
    protected $repository;

    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
    	$items = $this->repository->model->paginate();

        return view('masterdata.role.index',compact('items'));
    }

    public function create(){
        return view('masterdata.role.create');
    }

    public function store(RoleStore $request)
    {
        $item = $this->repository->createNew($request->all());

        return redirect()->route('masterdata.role.edit', ['id' => $item->id]);
    }

    public function edit($id)
    {
    	$item = $this->repository->model->find($id);

        return view('masterdata.role.edit', compact('item'));
    }

    public function update(RoleStore $request, $id)
    {
        $role_store = $this->repository->model->find($id);

        $item = $this->repository->updateOld($role_store, $request->all());

       return redirect()->route('masterdata.role.edit', ['id' => $item->id]);

    }

    public function destroy($id)
    {
    	$role = $this->repository->model->findOrFail($id);

        $role->delete();

        return redirect()->route('masterdata.role.index');
    }

}
