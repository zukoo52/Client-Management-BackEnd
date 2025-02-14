<?php

namespace Modules\ClientManagement\app\Repositaries;
use Modules\ClientManagement\app\Repositaries\ClientInterface;


use Modules\ClientManagement\app\Models\Clients;

class ClientImplementations implements ClientInterface
{

    // get all Client data
    public function allClients()
    {
        $Client = Clients::select('Clients.id','Clients.name', 'Clients.email', 'Clients.phone', 'Clients.company' ,'Clients.address')
        ->get();

    return $Client;
    }




    // store Client data
    public function store($data)
    {
        $Client = Clients::create($data);

        return $Client;
    }

    // update Client data
    public function  update($data, $id)
    {

        $id->update($data);

        return $data;
    }

    // delete Client
    public function  delete($id)
    {
        $id->delete();
    }
}
