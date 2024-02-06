<?php

namespace App\Http\Controllers;

use App\Repositories\ClientRepository;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $clientRepository;
    public function __construct(ClientRepository $clientRepo){
        $this->clientRepository = $clientRepo;
    }
    public function store(Request $request){
        try {
            $this->clientRepository->store($request->all());
            return response()->json(['status' => true, 'message' =>  "Successfully created client."]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function update(Request $request, $id){
        try {
            $client = $this->clientRepository->find($id);

            if (empty($client)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Client not found.",
                ],404);
            }

            $this->clientRepository->update($request->all(),$id);
            return response()->json([
                'status'=>true,
                'data'=> $client,
                'message'=>"Successfully updated client.",
            ]);

        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function delete($id){
        try {
            $client = $this->clientRepository->find($id);

            if (empty($client)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Client not found.",
                ],404);
            }

            $this->clientRepository->delete($id);
            return response()->json([
                'status'=> true,
                'message'=> "Client has been deleted successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
}
