<?php

namespace App\Http\Controllers\WordMean;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WordMean\WordMeanService;

class WordMeanController extends Controller
{
    //
    private $wordMeanService;

    public function __construct(WordMeanService $wordMeanService)
    {
        $this->wordMeanService = $wordMeanService;
    }

    // public function saveWordMean(Request $request)
    // {
    //     try {

    //         $data = $this->wordMeanService->saveWordMean($request);

    //         return $this->sentResponseSuccessful($data);
    //     } catch (\Exception $e) {

    //         return $this->sentResponseFail(100, $e->getMessage(), null);
    //     }
    // }

    // public function getWordMean(Request $request)
    // {
    //     try {

    //         $data = $this->wordMeanService->get($request);

    //         return $this->sentResponseSuccessful($data);
    //     } catch (\Exception $e) {

    //         return $this->sentResponseFail(100, $e->getMessage(), null);
    //     }
    // }
}
