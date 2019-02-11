<?php

namespace App\Http\Controllers;

use App\Company;
use Composer\Autoload\ClassLoader;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $company = Company::all();
        return $this->baseMethod($company);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $company = Company::find($id);
        return $this->baseMethod($company);
    }
//
//    public function update($id)
//    {
//        $company =
//    }

}
