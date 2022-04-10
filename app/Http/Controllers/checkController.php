<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class checkController extends Controller
{
    function loginView()
    {
        return view("manage/login");
    }

    function loginProfile()
    {
        return view("profile/login");
    }

    function registerView()
    {
        return view("manage/register");
    }

    function checkLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',   // required and email format validation
            'password' => 'required', // required and number field validation

        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return response()->json($validator->errors(), 422);
            // validation failed return with 422 status

        } else {
            //validations are passed try login using laravel auth attemp
            if (\Auth::attempt($request->only(["username", "password"]))) {
                return response()->json(["status" => true, "redirect_location" => url("index")]);
            } else {
                return response()->json([["ข้อมูลไม่ถูกต้อง"]], 422);
            }
        }
    }

    function checkLoginProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',   // required and email format validation
            'password' => 'required', // required and number field validation

        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return response()->json($validator->errors(), 422);
            // validation failed return with 422 status

        } else {
            //validations are passed try login using laravel auth attemp
            if (\Auth::attempt($request->only(["username", "password"]))) {
                return response()->json(["status" => true, "redirect_location" => url("profile")]);
            } else {
                return response()->json([["ข้อมูลไม่ถูกต้อง"]], 422);
            }
        }
    }

    function checkRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',   // required and email format validation
            'password' => 'required', // required and number field validation
            'confirm_password' => 'required|same:password',

        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return response()->json($validator->errors(), 422);
            // validation failed return back to form

        } else {
            //validations are passed, save new user in database
            $User = new User;
            $User->name = $request->name;
            $User->username = $request->username;
            $User->password = bcrypt($request->password);
            $User->save();

            return response()->json(["status" => true, "msg" => "สมัครสมาชิกสำเร็จ กลับไปเพื่อเข้าสู่ระบบ", "redirect_location" => url("login")]);
        }
    }
    // show dashboard
    function index()
    {
        return view("manage/index");
    }

    // logout method to clear the sesson of logged in user
    function logout()
    {
        \Auth::logout();
        return redirect("login")->with('success', 'Logout successfully');;
    }

    function logoutProfile()
    {
        \Auth::logout();
        return redirect("myprofile")->with('success', 'Logout successfully');;
    }
}
