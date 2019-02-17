<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
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

    /**
     * @param $model
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function baseMethod($model)
    {
        try {
            if($model->isEmpty())
            {
                return $this->sendResponse(null,404,'Empty data');
            }
            return $this->sendResponse($model, 200, 'Request succeeded');
        } catch (\Exception $e) {
            return $this->sendResponse(null, 500, $e->getMessage());
        }
    }
}
