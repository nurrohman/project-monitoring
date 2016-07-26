<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Client;
use App\Repositories\ClientRepository;
use App\Http\Requests\Masterdata\ClientStore;

class ClientController extends Controller
{
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $items = $this->repository->model->paginate();

        return view('masterdata.client.index', compact('items'));
    }

    public function create()
    {
        return view('masterdata.client.create', compact('isEdit'));
    }

    public function store(ClientStore $request)
    {
        $item = $this->repository->createNew($request->all());

        return redirect()->route('masterdata.client.edit', ['id' => $item->id]);
    }

    public function edit($id)
    {
        $item = $this->repository->model->find($id);

        return view('masterdata.client.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $client_store = Client::find($id);

        $item = $this->repository->updateOld($client_store, $request->all());

       return redirect()->route('masterdata.client.edit', ['id' => $item->id]);
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('masterdata.client.index');
    }
}
