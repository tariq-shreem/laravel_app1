<?php

namespace App\Http\Repositories;

use App\Http\ClientsHelper;
use App\Http\Interfaces\ClientsInterface;
use App\Http\Traits\ClientsTrait;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientsRepository implements ClientsInterface
{
    use ClientsTrait;

    private $clientModel;
    public $clientsHelper;

    public function __construct(Client $client, ClientsHelper $clientsHelper)
    {
        $this->clientModel = $client;
        $this->clientsHelper = $clientsHelper;
    }

    public function index(){

       $clients =  $this->clientModel::withCount('projects')->get();

       $clients = $clients->filter(function($client){
           return $client->projects_count == 0;
       });

       return view('Clients.index',compact('clients'));
    }

    public function create(){

        return view('Clients.create');
    }

    public function store($request){

        $this->clientModel::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
        ]);

        return $this->ClientRedireact("Client was Created");
    }

    public function edit($id){

        $client =$this->clientModel::findOrFail($id);

        return view('Clients.edit',compact('client'));
    }

    public function update($request){

        $this->clientModel::find($request->client_id)->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
        ]);

        return $this->ClientRedireact("Client was Updated");
    }

    public function delete($request){

        $this->clientModel::find($request->client_id)->delete();

        return $this->ClientRedireact("Client was Deleted");
    }

}
