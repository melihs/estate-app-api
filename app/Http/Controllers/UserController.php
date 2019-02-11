<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try
        {
            $user = User::all();
            return $this->sendResponse($user, 200, null);
        } catch (\Exception $e)
        {
            return $this->sendResponse(null,500,$e->getMessage($e));
        }
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try
        {
            $user = User::find($id);
            if(empty($user))
            {
                return $this->sendResponse($user,204,null);
            }
            return $this->sendResponse($user,200,null);
        }catch(\Exception $e)
        {
            return $this->sendResponse(null,500,$e->getMessage($e));
        }
    }
    
}
