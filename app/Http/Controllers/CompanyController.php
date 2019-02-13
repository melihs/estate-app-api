<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends BaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $this->authorize('users.personel');
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
        $this->authorize('users.personel');
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
        $this->authorize('users.personel');
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
        $this->authorize('users.personel');
        $company = Company::findOrFail($id);
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
        $this->authorize('users.personel');
        $company = Company::find($id)->delete();
        return $this->baseMethod($company);
    }
}
