<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppointmentController extends BaseController
{
    /**
     * AppointmentController constructor.
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function __construct()
    {
        $this->authorize('users.personel');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
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
        $appointment = Appointment::find($id)->delete();
        return $this->baseMethod($appointment);
    }
}
