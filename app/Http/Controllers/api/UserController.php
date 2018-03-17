<?php

namespace App\Http\Controllers\api;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return response()->json();
    }

    public function show($id)
    {
        $user = User::whereId($id)->first();

        return response()->json($user);
    }
}
