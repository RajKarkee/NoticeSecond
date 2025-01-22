<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


use Illuminate\Http\Request;

class LoginController extends Controller
{


    public function login(Request $request)
    {
        if ($request->getMethod() == "POST") {
            $validator = Validator::make($request->all(), [
                "email" => "required|email",
                "password" => "required"
            ]);
            if ($validator->passes()) {
                if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                    return redirect()->route("notice.index")->with("success", "Login right");
                } else {
                    return redirect("home")->with("error", "Failed");
                }
            }

            return redirect()->route('home')
                ->withErrors($validator)
                ->withInput();
        } else {
            return view("login");
        }
    }
}
