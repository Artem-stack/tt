<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdminUserFormRequest;
use App\Models\AdminUser;

class AuthController extends Controller
{
    public function index()
    {
        return view("admin.auth.login");
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
           
            "password" => ["required"]
        ]);


        if(auth("admin")->attempt($data)) {
            return redirect(route("admin.users.users"));
        }

        return redirect(route("admin.login"))->withErrors(["email" => "User not found or data entered incorrectly"]);
    }

    public function logout()
    {
        auth("admin")->logout();

        return redirect(route("home"));
    }
}
