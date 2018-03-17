<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return $this->formatState(compact('users'));
    }

    public function show($id)
    {
        $user = User::whereId($id)->first();

        return $this->formatState(compact('user'));
    }

    public function destroy($id)
    {
        User::destroy($id);

        return response()->json();
    }
}
