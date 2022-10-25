<?php

namespace App\Services\Blog;

use App\Repositories\Blog\BlogRepository;
use App\Repositories\Blog\BlogRepositoryInterface;
use Illuminate\Http\Request;

class BlogService {

    private $BlogRepo;

    public function __construct(BlogRepositoryInterface $BlogRepo) {
        $this->BlogRepo = $BlogRepo;
    }

    public function getAllBlog() {
        $data = $this->BlogRepo->getAllBlog();
        $returnData = [];

        foreach($data as $e) {
            if(!empty($e)) {
                $returnData[] = [
                    'id'        =>  $e->id,
                    'title'      =>  $e->title,
                    'content'     =>  $e->content,
                ];
            }
        }

        return $returnData;
    }

    public function getBlogById($id) {
        $data = $this->BlogRepo->getBlogById($id);
        $returnData = [];

        $returnData[] = [
            'id'        =>  $data->id,
            'title'      =>  $data->title,
            'content'     =>  $data->content,
        ];

        return $returnData;
    }

    public function getBlog($condition) {

        if($condition['page'] === null) {
            $condition['page'] = 0;
        }
        if($condition['page'] < 0) {
            return [];
        }

        $data = $this->BlogRepo->getBlog($condition);
        $returnData = [];

        foreach($data as $e) {
            if(!empty($e)) {
                $returnData[] = [
                    'id'        =>  $e->id,
                    'title'      =>  $e->title,
                    'content'     =>  $e->content,
                ];
            }
        }

        return $returnData;
    }

    public function saveBlog(Request $request) {
        $data = $request->all();

        if($blog = $this->BlogRepo->saveBlog($data)) {
            $returnData = [
                'title'  =>  $blog->name,
                'content'  =>  $blog->price,
            ];

            return $returnData;
        } else {
            return false;
        }
    }

    public function updateBlog(Request $request) {
        $data = $this->BlogRepo->updateBlog($request->input('id'), $request);
        if($data != false) {
            $returnData = new \stdClass();
            $returnData->title =$request->input('title');
            $returnData->content =$request->input('content');

            return $returnData;
        } else {
            throw new \Exception('Can\'t update product');
        }
    }

    public function deleteBlog(Request $request) {
        $data = $this->BlogRepo->deleteBlog($request->id);
        return $data;
    }
}