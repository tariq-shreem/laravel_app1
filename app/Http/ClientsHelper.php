<?php


namespace App\Http;


use App\Models\Client;

class ClientsHelper
{

    public function getClients()
    {
        return Client::get();
    }

}
