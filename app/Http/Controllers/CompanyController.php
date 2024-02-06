<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $companyRepository;
    public function __construct(CompanyRepository $companyRepo){
        $this->companyRepository = $companyRepo;
    }
    public function store(Request $request){
        try {
            $this->companyRepository->store($request->all());
            return response()->json(['status' => true, 'message' =>  "Successfully created company."]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function update(Request $request, $id){
        try {
            $company = $this->companyRepository->find($id);

            if (empty($company)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Company not found.",
                ],404);
            }

            $this->companyRepository->update($request->all(),$id);
            $company = $this->companyRepository->find($id);
            return response()->json([
                'status'=>true,
                'data'=> $company,
                'message'=>"Successfully updated company.",
            ]);

        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function delete($id){
        try {
            $company = $this->companyRepository->find($id);

            if (empty($company)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Company not found.",
                ],404);
            }

            $this->companyRepository->delete($id);
            return response()->json([
                'status'=> true,
                'message'=> "Company has been deleted successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
}
