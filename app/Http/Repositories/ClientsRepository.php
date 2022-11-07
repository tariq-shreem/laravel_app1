<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ClientsInterface;
use App\Models\Client;
use Illuminate\Support\Facades\Session;

class ClientsRepository implements ClientsInterface
{
    private $clientModel;

    public function __construct(Client $client)
    {
        $this->clientModel = $client;
    }

    public function index(){

        $clients =$this->clientModel::get();

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

    private function ClientRedireact($msg){
        Session::flash('msg',$msg);
        return redirect(route('clients.index'));
    }

}
