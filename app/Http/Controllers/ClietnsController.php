<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\DeleteClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClietnsController extends Controller
{
    public $model ;
    public function __construct(Client $client)
    {
        $this->model = $client;

    }
    public function index(){

        $clients =$this->model::get();

        return view('Clients.index',compact('clients'));
    }

    public function create(){

        return view('Clients.create');
    }

    public function store(CreateClientRequest $request){

       $this->model::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
        ]);

        return $this->ClientRedireact("Client was Created");

    }

    public function edit($id){

        $client =$this->model::findOrFail($id);

        return view('Clients.edit',compact('client'));
    }

    public function update(UpdateClientRequest $request){

       $this->model::find($request->client_id)->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
        ]);
        return $this->ClientRedireact("Client was Updated");

    }

    public function delete(DeleteClientRequest $request){

       $this->model::find($request->client_id)->delete();
        return $this->ClientRedireact("Client was Deleted");

    }

    public function ClientRedireact($msg){
        Session::flash('msg',$msg);
        return redirect(route('clients.index'));
    }
}
