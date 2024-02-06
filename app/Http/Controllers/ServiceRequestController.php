<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceRequestRepository;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    private $serviceRequestRepository;
    public function __construct(ServiceRequestRepository $serviceRequestRepo){
        $this->serviceRequestRepository = $serviceRequestRepo;
    }
    public function store(Request $request){
        try {
            $this->serviceRequestRepository->store($request->all());
            return response()->json(['status' => true, 'message' =>  "Successfully created service request."]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function update(Request $request, $id){
        try {
            $serviceRequest = $this->serviceRequestRepository->find($id);

            if (empty($serviceRequest)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Service request not found.",
                ],404);
            }

            $this->serviceRequestRepository->update($request->all(),$id);
            $serviceRequest = $this->serviceRequestRepository->find($id);
            return response()->json([
                'status'=>true,
                'data'=> $serviceRequest,
                'message'=>"Successfully updated service request.",
            ]);

        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function delete($id){
        try {
            $serviceRequest = $this->serviceRequestRepository->find($id);

            if (empty($serviceRequest)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Service request not found.",
                ],404);
            }

            $this->serviceRequestRepository->delete($id);
            return response()->json([
                'status'=> true,
                'message'=> "Service request has been deleted successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
}
