<?php

namespace Core\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Core\Responses\BaseResponse;
use Core\Contracts\BaseControllerInterface;

abstract class BaseController extends Controller implements BaseControllerInterface {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var BaseResponse
     */
    protected $response;

    public function __construct(BaseResponse $response)
    {
        $this->response = $response;
    }
}
