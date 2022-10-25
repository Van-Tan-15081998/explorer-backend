<?php

namespace App\Repositories\Blog;

use App\Repositories\Blog\BlogRepositoryInterface;
use App\Models\BlogModel;

class BlogMysqlRepository implements BlogRepositoryInterface {

    public function saveBlog($data) {
        $blog = new BlogModel;

        $blog->title = $data['title'];
        $blog->content = $data['content'];
        $blog->save();

        return $blog;
    }

    public function getAllBlog() {
        return BlogModel::select('*')->get();
    }

    public function getBlogById($id) {
        $blog = BlogModel::find($id);
        if($blog == []) {
            throw new \Exception('Don\'t have message id: '.$id.'.');
        }

        return $blog;
    }

    public function getBlog($data) {
        $limit = 30;

        return BlogModel::select('*')
                                ->limit($limit)
                                ->get()->toArray();
    }

    public function deleteBlog($id) {
        $blog = BlogModel::find($id);
        if($blog == []) {
            throw new \Exception('Don\'t have message id: '.$id.'.');
        }

        return $blog->delete();
    }

    public function updateBlog($id, $data) {
        $blog = BlogModel::find($id);
        if($blog == []) {
            throw new \Exception('Don\'t have message id: '.$id.'.');
        }

        $blog->fill($data->all())
            ->save();

        return $blog;
    }
}
