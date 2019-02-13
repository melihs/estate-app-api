<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppointmentController extends BaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('users.personel');
        $appointment = Appointment::all();
        return $this->baseMethod($appointment);
    }

    /**
     * @param AppointmentRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(AppointmentRequest $request)
    {
        $this->authorize('users.personel');
        $appointment = Appointment::create($request->all());
        return $this->baseMethod($appointment);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($id)
    {
        $this->authorize('users.personel');
        $appointment = Appointment::find($id);
        return $this->baseMethod($appointment);
    }

    /**
     * @param AppointmentRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(AppointmentRequest $request,$id)
    {
        $this->authorize('users.personel');
        $appointment = Appointment::find($id);
        $appointment->update($request->all());
        return $this->baseMethod($appointment);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($id)
    {
        $this->authorize('users.personel');
        $appointment = Appointment::find($id)->delete();
        return $this->baseMethod($appointment);
    }
}
