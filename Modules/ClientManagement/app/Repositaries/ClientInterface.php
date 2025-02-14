<?php

namespace Modules\ClientManagement\app\Repositaries;



interface ClientInterface
{
    public function allClients();
    public function store($data);
    public function update($data, $id);
    public function delete($id);
}
