<?php


namespace App\Http\Services;


use App\Models\Client;

class ClientService
{

    public function getClients()
    {
        return Client::get();
    }

}
