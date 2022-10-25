<?php

namespace Core\Responses;

use Core\Http\Response\JsonResponse;

class BaseResponse
{
    private function makeJsonResponse($method, $data, $errorCode, $errorMessages, $message = null)
    {
        if (in_array($method, ['success', 'created', 'updated']))
            return JsonResponse::{$method}($message, $data);
        else if(in_array($method, ['error', 'exception', 'validateFail']))
            return JsonResponse::{$method}($message, $errorCode, $errorMessages);
        else
            return JsonResponse::{$method}($message); // deleted
    }

    public function data($data, $message = null) {
        return $this->makeJsonResponse('success', $data, 0, [], $message);
    }

    public function created($data, $message = null) {
        return $this->makeJsonResponse('created', $data, 0, [], $message);
    }

    public function updated($data, $message = null) {
        return $this->makeJsonResponse('updated', $data, 0, [], $message);
    }

    public function deleted($message = null) {
        return $this->makeJsonResponse('deleted', null, 0, [], $message);
    }

    public function error($errorCode, $errorMessages, $message = null) {
        return $this->makeJsonResponse('exception', null, $errorCode, $errorMessages, $message);
    }

    public function serverError($errorCode, $errorMessages, $message = null) {
        return $this->makeJsonResponse('error', null, $errorCode, $errorMessages, $message);
    }

    public function validationError($errorCode, $errorMessages, $message = null) {
        return $this->makeJsonResponse('validateFail', null, $errorCode, $errorMessages, $message);
    }

}
