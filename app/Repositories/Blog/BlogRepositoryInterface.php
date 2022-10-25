<?php

namespace App\Repositories\Blog;

interface BlogRepositoryInterface {

    public function saveBlog($data);

    public function getBlog($data);

    public function deleteBlog($id);

    public function updateBlog($id, $data);

}