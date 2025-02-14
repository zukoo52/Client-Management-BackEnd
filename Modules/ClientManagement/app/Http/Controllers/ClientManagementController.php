<?php

namespace Modules\ClientManagement\app\Http\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\ClientManagement\app\Models\clients;
use Modules\ClientManagement\app\Repositaries\ClientInterface;
use Modules\ClientManagement\app\Http\Requests\AddClientRequest;
use Modules\ClientManagement\app\Http\Requests\UpdateClientRequest;

class ClientManagementController extends Controller
{
    protected $interface;

    public function __construct(ClientInterface $interfce)
    {
        $this->interface = $interfce;
    }

    public function allClients()
    {
        try {
            $response =  $this->interface-> allClients();
            return response()->json([
                'data' =>  $response
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }




    public function store(AddClientRequest $request)
    {
        $validateddata = $request->validated();
        try {
            $response =  $this->interface->store($validateddata);
            return response()->json([
                'data' =>  $response
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('clientmanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('clientmanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, clients $id)
    {
        $validateddata = $request->validated();
        try {
            $response =  $this->interface->update($validateddata , $id);
            return response()->json([
                'data' =>  $response
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( clients $id)
    {
        try {
            $response =  $this->interface->delete($id);
            return response()->json([
                'data' =>  $response,
                'message' => 'SuccessFully Deleted',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
