<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;

class UsersController extends ApiController
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->ApiResponse(1, User::all());
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $resource_data = $request->onlyWith([
            'user', 'password','age'
        ]);

        $user = new User();
        $user->fill($resource_data);
        $user->save();

        return $this->ApiResponse(1,null);
    }

    /**
     * @param $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($user)
    {
        return $this->ApiResponse(1,User::findOrFail($user));
    }


    /**
     * @param UpdateRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $resource_data = $request->onlyWith([
            'user', 'password', 'age'
        ]);

        $user->fill($resource_data);
        $user->save();

        return $this->ApiResponse(1,null);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->favorites()->delete();

        $user->gettingFavorite()->delete();
        $user->delete();

        return $this->ApiResponse(1, null);

    }


}
