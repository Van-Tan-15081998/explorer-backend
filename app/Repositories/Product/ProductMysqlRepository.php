<?php

namespace App\Repositories\Product;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Models\ProductModel;

class ProductMysqlRepository implements ProductRepositoryInterface {

    public function saveProduct($data) {
        $product = new ProductModel;

        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->quantity = $data['quantity'];
        $product->save();

        return $product;
    }

    public function getAllProduct() {
        return ProductModel::select('*')->get();
    }

    public function getProductById($id) {
        $product = ProductModel::find($id);
        if($product == []) {
            throw new \Exception('Don\'t have message id: '.$id.'.');
        }

        return $product;
    }

    public function getProduct($data) {
        $limit = 30;

        return ProductModel::select('*')
                                ->limit($limit)
                                ->get()->toArray();
    }

    public function deleteProduct($id) {
        $product = ProductModel::find($id);
        if($product == []) {
            throw new \Exception('Don\'t have message id: '.$id.'.');
        }

        return $product->delete();
    }

    public function updateProduct($id, $data) {
        $product = ProductModel::find($id);
        if($product == []) {
            throw new \Exception('Don\'t have message id: '.$id.'.');
        }

        $product->fill($data->all())
            ->save();

        return $product;
    }
}