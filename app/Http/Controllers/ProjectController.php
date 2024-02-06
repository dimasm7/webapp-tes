<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projectRepository;
    public function __construct(ProjectRepository $projectRepo){
        $this->projectRepository = $projectRepo;
    }
    public function store(Request $request){
        try {
            $this->projectRepository->store($request->all());
            return response()->json(['status' => true, 'message' =>  "Successfully created project."]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function update(Request $request, $id){
        try {
            $project = $this->projectRepository->find($id);

            if (empty($project)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Project not found.",
                ],404);
            }

            $this->projectRepository->update($request->all(),$id);
            return response()->json([
                'status'=>true,
                'data'=> $project,
                'message'=>"Successfully updated project.",
            ]);

        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function delete($id){
        try {
            $project = $this->projectRepository->find($id);

            if (empty($project)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Project not found.",
                ],404);
            }

            $this->projectRepository->delete($id);
            return response()->json([
                'status'=> true,
                'message'=> "Project has been deleted successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
}
