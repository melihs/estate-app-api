<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $this->authorize('users.personel');
        $user = User::all();
        return $this->baseMethod($user);
    }

    /**
     * @param UserRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request)
    {
        $this->authorize('users.personel');
       $createUser = new User($request->all());
       $createUser->password = Hash::make($request->password);
       $createUser->save();
       return $this->baseMethod($createUser);
    }
    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $this->authorize('users.personel');
        $user = User::find($id);
        return $this->baseMethod($user);
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse|mixed|string|null
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->authorize('users.personel');
        $user = User::findOrFail($id);
        $request->validate([
            'name'     => 'required|string',
            'surname'  => 'string',
            'address'  => 'string',
            'phone'    => 'string',
            'personel' => 'string'
        ]);
        $this->emailValid($user);
        $this->passwordValid($user);
        $user->update([
            'name'    => $request->name,
            'surname' => $request->surname,
            'address' => $request->address,
            'phone'   => $request->phone,
            'personel'=> $request->personel,
        ]);
        return $this->baseMethod($user);
    }

    public function destroy($id)
    {
        $this->authorize('users.personel');
        $user = User::find($id)->delete();
        $this->baseMethod($user);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function UserCompany($id)
    {
        $this->authorize('users.personel');
        $company = User::find($id)->companies()->get();
        return $this->baseMethod($company);
    }

    /**
     * @param $user
     *
     * @return mixed|string
     */
    private function emailValid($user)
    {
        if ($user->email !== request('email') || empty(request('email'))) {
            $this->validate(request(),[ 'email' => 'required|string|email|unique:users' ]);
            $user->email = request('email');
            return $user->email;
        }
}

    /**
     * @param $user
     *
     * @return string|null
     * @throws \Illuminate\Validation\ValidationException
     */
    private function passwordValid($user)
    {
        if (request('password')) {
            $this->validate(request(), [ 'password' => 'required|string|min:6|confirmed' ]);
            $user->password = Hash::make(request('password'));
            return $user->password;
        }
    }
}
