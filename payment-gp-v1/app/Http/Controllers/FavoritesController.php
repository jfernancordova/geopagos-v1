<?php

namespace App\Http\Controllers;

use App\Entities\Favorite;
use App\Entities\User;
use App\Http\Requests\Favorites\StoreRequest;

class FavoritesController extends ApiController
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->ApiResponse(1,Favorite::all());
    }

    /**
     * @param $userCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($userCode)
    {
        $user = User::findOrFail($userCode);
        return $this->ApiResponse(1,['user' => $user->favorites]);
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $resource_data = $request->onlyWith([
            'user_code', 'user_code_favorite'
        ]);

        return $this->validationForUsers($resource_data['user_code'],
            new Favorite(), $resource_data);

    }

    /**
     * @param $userCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($userCode)
    {
        $user = User::find($userCode);
        $user->destroy();

        return $this->ApiResponse(1,null);
    }

}
