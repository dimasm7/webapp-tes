<?php

namespace App\Http\Controllers;

use App\Repositories\PurchaseOrderRepository;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    private $purchaseOrderRepository;
    public function __construct(PurchaseOrderRepository $purchaseOrderRepo){
        $this->purchaseOrderRepository = $purchaseOrderRepo;
    }
    public function store(Request $request){
        try {
            $this->purchaseOrderRepository->store($request->all());
            return response()->json(['status' => true, 'message' =>  "Successfully created purchase order."]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function update(Request $request, $id){
        try {
            $purchaseOrder = $this->purchaseOrderRepository->find($id);

            if (empty($purchaseOrder)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Purchase order not found.",
                ],404);
            }

            $this->purchaseOrderRepository->update($request->all(),$id);
            $purchaseOrder = $this->purchaseOrderRepository->find($id);
            return response()->json([
                'status'=>true,
                'data'=> $purchaseOrder,
                'message'=>"Successfully updated purchase order.",
            ]);

        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
    public function delete($id){
        try {
            $purchaseOrder = $this->purchaseOrderRepository->find($id);

            if (empty($purchaseOrder)) {
                return response()->json([
                    'status'=>false,
                    'message'=>"Purchase order not found.",
                ],404);
            }

            $this->purchaseOrderRepository->delete($id);
            return response()->json([
                'status'=> true,
                'message'=> "Purchase order has been deleted successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false,' errors'=> $th->getMessage(), 'message' => 'Something\'s wrong'],400);
        }
    }
}
