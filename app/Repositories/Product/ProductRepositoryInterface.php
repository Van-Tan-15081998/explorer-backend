<?php

namespace App\Repositories\Product;

interface ProductRepositoryInterface {

    public function saveProduct($data);

    public function getProduct($data);

    public function deleteProduct($id);

    public function updateProduct($id, $data);

}