<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ClientsInterface;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\DeleteClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClietnsController extends Controller
{
    public $clientsInterface;

    public function __construct(ClientsInterface $clientsInterface)
    {
        $this->clientsInterface = $clientsInterface;
    }

    public function index(){
        return $this->clientsInterface->index();
    }

    public function create(){

        return $this->clientsInterface->create();
    }

    public function store(CreateClientRequest $request){

        return $this->clientsInterface->store($request);
    }

    public function edit($id){

        return $this->clientsInterface->edit($id);
    }

    public function update(UpdateClientRequest $request){

        return $this->clientsInterface->update($request);
    }

    public function delete(DeleteClientRequest $request){

        return $this->clientsInterface->delete($request);
    }

}
