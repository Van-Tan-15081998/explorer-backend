<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductService {

    private $ProductRepo;

    public function __construct(ProductRepositoryInterface $ProductRepo) {
        $this->ProductRepo = $ProductRepo;
    }

    public function getAllProduct() {
        $data = $this->ProductRepo->getAllProduct();
        $returnData = [];

        foreach($data as $e) {
            if(!empty($e)) {
                $returnData[] = [
                    'id'        =>  $e->id,
                    'name'      =>  $e->name,
                    'price'     =>  $e->price,
                    'quantity'  =>  $e->quantity,
                ];
            }
        }

        return $returnData;
    }

    public function getProductById($id) {
        $data = $this->ProductRepo->getProductById($id);
        $returnData = [];

        $returnData[] = [
            'id'        =>  $data->id,
            'name'      =>  $data->name,
            'price'     =>  $data->price,
            'quantity'  =>  $data->quantity,
        ];

        return $returnData;
    }

    public function getProduct($condition) {

        if($condition['page'] === null) {
            $condition['page'] = 0;
        }
        if($condition['page'] < 0) {
            return [];
        }

        $data = $this->ProductRepo->getProduct($condition);
        $returnData = [];

        foreach($data as $e) {
            if(!empty($e)) {
                $returnData[] = [
                    'id'        =>  $e->id,
                    'name'      =>  $e->name,
                    'price'     =>  $e->price,
                    'quantity'  =>  $e->quantity,
                ];
            }
        }

        return $returnData;
    }

    public function saveProduct(Request $request) {
        $data = $request->all();

        if($product = $this->ProductRepo->saveProduct($data)) {
            $returnData = [
                'name'  =>  $product->name,
                'price'  =>  $product->price,
                'quantity'  =>  $product->quantity
            ];

            return $returnData;
        } else {
            return false;
        }
    }

    public function updateProduct(Request $request) {
        $data = $this->ProductRepo->updateProduct($request->input('id'), $request);
        if($data != false) {
            $returnData = new \stdClass();
            $returnData->name =$request->input('name');
            $returnData->price =$request->input('price');
            $returnData->quantity =$request->input('quantity');

            return $returnData;
        } else {
            throw new \Exception('Can\'t update product');
        }
    }

    public function deleteProduct(Request $request) {
        $data = $this->ProductRepo->deleteProduct($request->id);
        return $data;
    }
}