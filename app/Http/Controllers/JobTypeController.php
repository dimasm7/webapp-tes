<?php

namespace App\Http\Controllers;

use App\Repositories\JobTypeRepository;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    private $jobTypeRepository;
    public function __construct(JobTypeRepository $jobTypeRepo){
        $this->jobTypeRepository = $jobTypeRepo;
    }
    public function store(Request $request){
        try {
            $this->jobTypeRepository->store($request->all());
            return response()->json(['status' => true, 'message' =>  "Successfully created job type."]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function update(Request $request, $id){
        try {
            $jobType = $this->jobTypeRepository->find($id);

            if (empty($jobType)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Job type not found.",
                ],404);
            }

            $this->jobTypeRepository->update($request->all(),$id);
            $jobType = $this->jobTypeRepository->find($id);
            return response()->json([
                'status'=>true,
                'data'=> $jobType,
                'message'=>"Successfully updated job type.",
            ]);

        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function delete($id){
        try {
            $jobType = $this->jobTypeRepository->find($id);

            if (empty($jobType)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Job type not found.",
                ],404);
            }

            $this->jobTypeRepository->delete($id);
            return response()->json([
                'status'=> true,
                'message'=> "Job type has been deleted successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
}
