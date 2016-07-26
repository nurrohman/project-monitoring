<?php

namespace App\Http\Controllers;

use App\Model\Employee;
use App\Http\Requests;
use App\Repositories\EmployeeRepository;
use App\Http\Requests\Masterdata\EmployeeStore;
use App\Http\Requests\Masterdata\EmployeeUpdate;

class EmployeeController extends Controller
{
    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->repository->model->paginate();

        return view('masterdata.employee.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterdata.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStore $request)
    {
        $items = $this->repository->createNew($request->all());

        return redirect()->route('masterdata.employee.edit', ['id' => $items->id]);
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

        return view('masterdata.employee.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdate $request, $id)
    {
        $employee_store = Employee::find($id);

        $item = $this->repository->updateOld($employee_store, $request->all());

        return redirect()->route('masterdata.employee.edit', ['id' => $item->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
