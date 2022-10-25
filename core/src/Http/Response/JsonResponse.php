<?php

namespace Core\Http\Response;

class JsonResponse
{

    protected static function makeResponse($data = null, int $errorCode, array $errorMessages = [], String $message = null)
    {
        $content = [
            'message'       =>  $message,
            'error_code'    =>  $errorCode,
            'error_msg'     =>  $errorMessages,
            'data'          =>  $data,
        ];

        return response()->json($content);
    }

    public static function success($data, $message = null)
    {
        if ($message === null) {
            $message = 'Call API - success';
        }

        return static::makeResponse($data, 0, [], $message);
    }

    public static function error(int $errorCode, $errorMessages, $message = null)
    {
        if ($message === null) {
            $message = 'Call API - error';
        }

        return static::makeResponse(null, $errorCode, $errorMessages, $message);
    }

    public static function exception(int $errorCode, array $errorMessages = [], string $message = null)
    {
        if ($message === null) {
            $message = 'Call API - exception';
        }

        return static::makeResponse(null, $errorCode, $errorMessages, $message);
    }

    public static function created($data, $message = null)
    {
        if ($message === null) {
            $message = 'Call API - created';
        }

        return static::makeResponse($data, 0, [], $message);
    }

    public static function updated($data, $message = null)
    {
        if ($message === null) {
            $message = 'Call API - updated';
        }

        return static::makeResponse($data, 0, [], $message);
    }

    public static function deleted($message = null)
    {
        if ($message === null) {
            $message = 'Call API - deleted';
        }

        return static::makeResponse(null, 0, [], $message);
    }

    public static function validateFail(int $errorCode, array $errorMessages, $message = null)
    {
        if ($message === null) {
            $message = 'Call API - validate fail';
        }

        return static::makeResponse(null, $errorCode, $errorMessages, $message);
    }
}
