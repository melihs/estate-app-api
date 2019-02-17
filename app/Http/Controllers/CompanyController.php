<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
    /**
     * CompanyController constructor.
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __construct()
    {
        $this->authorize('users.personel');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $company = Company::all();
        return $this->baseMethod($company);
    }

    /**
     * @param CompanyRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CompanyRequest $request)
    {
        $company = Company::create($request->all());
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

    /**
     * @param CompanyRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CompanyRequest $request,$id)
    {
        $company = Company::find($id);
        $company->update($request->all());
        return $this->baseMethod($company);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $company = Company::find($id)->delete();
        return $this->baseMethod($company);
    }
}
