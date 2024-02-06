<?php

namespace App\Http\Controllers;

use App\Repositories\JobRepository;
use Illuminate\Http\Request;

class JobController extends Controller
{
    private $jobRepository;
    public function __construct(JobRepository $jobRepo){
        $this->jobRepository = $jobRepo;
    }
    public function store(Request $request){
        try {
            $this->jobRepository->store($request->all());
            return response()->json(['status' => true, 'message' =>  "Successfully created job."]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function update(Request $request, $id){
        try {
            $job = $this->jobRepository->find($id);

            if (empty($job)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Job not found.",
                ],404);
            }

            $this->jobRepository->update($request->all(),$id);
            return response()->json([
                'status'=>true,
                'data'=> $job,
                'message'=>"Successfully updated job.",
            ]);

        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function delete($id){
        try {
            $job = $this->jobRepository->find($id);

            if (empty($job)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Job not found.",
                ],404);
            }

            $this->jobRepository->delete($id);
            return response()->json([
                'status'=> true,
                'message'=> "Job has been deleted successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
}
