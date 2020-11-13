<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function getusers(): AnonymousResourceCollection
    {
        $users = User::with(['emails','departments'])->get();
        return UserResource::collection($users);
    }
}
