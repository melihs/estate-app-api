<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index()
    {
        try
        {
            $user = User::all();
            return $this->sendResponse($user, 200, null);
        } catch (\Exception $e)
        {
            return $this->sendResponse(null,500,$e->getMessage());
        }
    }
}
