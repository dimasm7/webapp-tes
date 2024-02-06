<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Repositories\ClientRepository;

class ClientController extends Controller
{
    private $clientRepository;
    public function __construct(ClientRepository $clientRepo){
        $this->clientRepository = $clientRepo;
    }
    public function index(){
        $clients =  $this->clientRepository->getAll();
        return view('clients.index', compact('clients'));
    }
    public function create(){
        return view('clients.create');
    }
    public function store(CreateClientRequest $request){
        $this->clientRepository->store($request->all());
        return redirect(route('clients.index'))->with('status', 'Successfully created client.');
    }
    public function show($id){
        $client = $this->clientRepository->find($id);
        return view('clients.show', compact('client'));
    }
    public function edit($id){
        $client = $this->clientRepository->find($id);
        return view('clients.edit', compact('client'));
    }
    public function update(UpdateClientRequest $request, $id){
        $client = $this->clientRepository->find($id);

        if (empty($client)) return redirect(route('clients.index'))->with('status', 'Client not found.');

        $this->clientRepository->update($request->all(),$id);
        $client = $this->clientRepository->find($id);

        return redirect(route('clients.index'))->with('status', 'Successfully updated client.');
    }
    public function destroy($id){
        $client = $this->clientRepository->find($id);
        if (empty($client)) return redirect(route('clients.index'))->with('status', 'Client not found.');
        
        $this->clientRepository->delete($id);
        return redirect(route('clients.index'))->with('status', 'Client has been deleted successfully');
    }
}
