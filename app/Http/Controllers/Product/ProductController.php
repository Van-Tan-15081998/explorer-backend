<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Product\ProductService;

class ProductController extends Controller {

    private $ProductService;

    public function __construct(ProductService $ProductService) {
        $this->ProductService    = $ProductService;
    }

    public function getAll() {
        
        try {
            $data = $this->ProductService->getAllProduct();

            // return $this->sentResponseSuccessful($data);
            return response()->json($this->sentResponseSuccessful($data));

        } catch (\Exception $e) {
            return $this->sentResponseFail(100, $e->getMessage(), null);
        }
    }

    public function getProductById(Request $request) {
        try {

            $data = $this->ProductService->getProductById($request->id);

            return $this->sentResponseSuccessful($data);

        } catch (\Exception $e) {

            return $this->sentResponseFail(100, $e->getMessage(), null);

        }
    }

    public function save(Request $request) {

        return $this->ProductService->saveProduct($request);

    }

    public function update(Request $request) {

        return $this->ProductService->updateProduct($request);

    }

    public function delete(Request $request) {
        $msgDeleteSuccess = "Delete product successfully";
        
        try {

            $delete = $this->ProductService->deleteProduct($request);
            return response()->json($this->sentResponseSuccessful($msgDeleteSuccess));

        } catch(\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));

        }

    }
}