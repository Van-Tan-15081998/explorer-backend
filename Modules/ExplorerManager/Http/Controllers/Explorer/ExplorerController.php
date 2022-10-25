<?php

namespace Modules\ExplorerManager\Http\Controllers\Explorer;

use Core\Http\Controllers\CoreController;
use Core\Responses\BaseResponse;
use Illuminate\Http\Request;

class ExplorerController extends CoreController {
    public function __construct(BaseResponse $response)
    {
        parent::__construct($response);
    }

    public function create(Request $request) {
        return $this->response->created("Đây là Data", "Thành công");
    }
}
