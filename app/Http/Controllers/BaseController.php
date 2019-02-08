<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * @param $result
     * @param $code
     * @param $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($result, $code, $message)
    {
        $response = [
            'data'          => $result,
            'code'          => $code,
            'errorMessage'  => $message,
        ];
        return response()->json($response, $code);
    }
}
