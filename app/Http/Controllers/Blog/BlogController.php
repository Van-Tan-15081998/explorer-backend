<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Blog\BlogService;

class BlogController extends Controller
{
    private $BlogService;

    public function __construct(BlogService $BlogService) {
        $this->BlogService    = $BlogService;
    }

    public function getAll() {
        try {
            $data = $this->BlogService->getAllBlog();

            // return $this->sentResponseSuccessful($data);
            return response()->json($this->sentResponseSuccessful($data));

        } catch (\Exception $e) {
            return $this->sentResponseFail(100, $e->getMessage(), null);
        }
    }

    public function getBlogById(Request $request) {
        try {

            $data = $this->BlogService->getBlogById($request->id);

            return $this->sentResponseSuccessful($data);

        } catch (\Exception $e) {

            return $this->sentResponseFail(100, $e->getMessage(), null);

        }
    }

    public function save(Request $request) {

        return $this->BlogService->saveBlog($request);

    }

    public function update(Request $request) {

        return $this->BlogService->updateBlog($request);

    }

    public function delete(Request $request) {
        $msgDeleteSuccess = "Delete blog successfully";
        
        try {

            $delete = $this->BlogService->deleteBlog($request);
            return response()->json($this->sentResponseSuccessful($msgDeleteSuccess));

        } catch(\Exception $e) {

            return response()->json($this->sentResponseFail(1, $e->getMessage(), null));

        }

    }
}
