<?php

namespace App\Http\Controllers;

use App\Repositories\LanguageRepository;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    private $languageRepository;
    public function __construct(LanguageRepository $languageRepo){
        $this->languageRepository = $languageRepo;
    }
    public function store(Request $request){
        try {
            $this->languageRepository->store($request->all());
            return response()->json(['status' => true, 'message' =>  "Successfully created language."]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function update(Request $request, $id){
        try {
            $language = $this->languageRepository->find($id);

            if (empty($language)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Language not found.",
                ],404);
            }

            $this->languageRepository->update($request->all(),$id);
            return response()->json([
                'status'=>true,
                'data'=> $language,
                'message'=>"Successfully updated language.",
            ]);

        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function delete($id){
        try {
            $language = $this->languageRepository->find($id);

            if (empty($language)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Language not found.",
                ],404);
            }

            $this->languageRepository->delete($id);
            return response()->json([
                'status'=> true,
                'message'=> "Language has been deleted successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
}
