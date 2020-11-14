<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function getusers(): AnonymousResourceCollection
    {
        $users = User::with(['emails', 'departments'])->get();

        return UserResource::collection($users);
    }

    /**
     * @param string $id
     * @return UserResource
     */
    public function edit(string $id): UserResource
    {
        $user = User::with(['emails', 'departments'])->where('id', $id)->first();

        return new UserResource($user);
    }


    /**
     * @param Request $request
     * @return Builder|Model|object|null
     */
    public function update(Request $request)
    {
        $user = User::with('emails')->where('id', $request->get('id'))->first();
        $userEmails = $user->emails()->pluck('address')->toArray();
        $email = $request->get('email');

        if (!in_array($email, $userEmails)) {
            return $user->emails()->create(['address' => $email]);
        }

        return $user;
    }
}
