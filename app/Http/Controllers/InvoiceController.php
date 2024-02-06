<?php

namespace App\Http\Controllers;

use App\Repositories\InvoiceRepository;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private $invoiceRepository;
    public function __construct(InvoiceRepository $invoiceRepo){
        $this->invoiceRepository = $invoiceRepo;
    }
    public function store(Request $request){
        try {
            $this->invoiceRepository->store($request->all());
            return response()->json(['status' => true, 'message' =>  "Successfully created invoice."]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function update(Request $request, $id){
        try {
            $serviceRequest = $this->invoiceRepository->find($id);

            if (empty($serviceRequest)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Invoice not found.",
                ],404);
            }

            $this->invoiceRepository->update($request->all(),$id);
            $serviceRequest = $this->invoiceRepository->find($id);
            return response()->json([
                'status'=>true,
                'data'=> $serviceRequest,
                'message'=>"Successfully updated invoice.",
            ]);

        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function delete($id){
        try {
            $serviceRequest = $this->invoiceRepository->find($id);

            if (empty($serviceRequest)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Invoice not found.",
                ],404);
            }

            $this->invoiceRepository->delete($id);
            return response()->json([
                'status'=> true,
                'message'=> "Invoice has been deleted successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
}
