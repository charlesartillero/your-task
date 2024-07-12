<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return UserResource::collection(User::paginate());
    }

    public function show(string $id) {
        $user = User::find($id);

        if ($user == null) {
            return 'not found!';
        }

        return new UserResource($user);


    }
}