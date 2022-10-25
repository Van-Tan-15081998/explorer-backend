<?php

namespace Core\Http\Controllers;

use Core\Responses\BaseResponse;

abstract class CoreController extends BaseController {
    public function __construct(BaseResponse $response)
    {
        parent::__construct($response);
    }
}
