<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    function login(Request $request)
    {
        $user = User::where("EMAIL", $request->email)->first();
        // return $request;
        if (!$user || !Hash::check($request->password, $user->PASSWORD)) {
            return "Please provide valid email and password.";
        } else {
            $request->session()->put("user", $user);
            return redirect("/");
        }
    }
}