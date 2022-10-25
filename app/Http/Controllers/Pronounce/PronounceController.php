<?php

namespace App\Http\Controllers\Pronounce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Pronounce\PronounceService;

class PronounceController extends Controller
{
    //
    private $pronounceService;

    public function __construct(PronounceService $pronounceService)
    {
        $this->pronounceService = $pronounceService;
    }

    // public function savePronounce(Request $request)
    // {
    //     try {

    //         $data = $this->pronounceService->save($request);

    //         return $this->sentResponseSuccessful($data);
    //     } catch (\Exception $e) {

    //         return $this->sentResponseFail(100, $e->getMessage(), null);
    //     }
    // }

    public function getPronounce(Request $request)
    {
        try {

            $data = $this->pronounceService->get($request);

            return $this->sentResponseSuccessful($data);
        } catch (\Exception $e) {

            return $this->sentResponseFail(100, $e->getMessage(), null);
        }
    }
}
