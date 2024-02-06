<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceOfferingRepository;
use Illuminate\Http\Request;

class ServiceOfferingController extends Controller
{
    private $serviceOfferingRepository;
    public function __construct(ServiceOfferingRepository $serviceOfferingRepo){
        $this->serviceOfferingRepository = $serviceOfferingRepo;
    }
    public function store(Request $request){
        try {
            $this->serviceOfferingRepository->store($request->all());
            return response()->json(['status' => true, 'message' =>  "Successfully created service offering."]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function update(Request $request, $id){
        try {
            $serviceOffering = $this->serviceOfferingRepository->find($id);

            if (empty($serviceOffering)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Service offering not found.",
                ],404);
            }

            $this->serviceOfferingRepository->update($request->all(),$id);
            return response()->json([
                'status'=>true,
                'data'=> $serviceOffering,
                'message'=>"Successfully updated service offering.",
            ]);

        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function delete($id){
        try {
            $serviceOffering = $this->serviceOfferingRepository->find($id);

            if (empty($serviceOffering)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Service offering not found.",
                ],404);
            }

            $this->serviceOfferingRepository->delete($id);
            return response()->json([
                'status'=> true,
                'message'=> "Service offering has been deleted successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
}
