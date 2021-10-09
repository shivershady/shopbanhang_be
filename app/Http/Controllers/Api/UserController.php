<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Util\Exception;

class UserController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required:email',
            'password' => 'required|min:6',
            'c_password' => 'required:same:password'
        ]);

        try {
            $data = request()->only(['name', 'email', 'password']);
            $data['password'] = Hash::make($data['password']);
            User::create($data);
        } catch (Exception $e) {
            return response()->json('error', 500);
        }
        return response()->json(['success', 'đăng ký thành công'], 200);
    }


    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $check = Auth::attempt([
            'email' => $email,
            'password' => $password,
        ]);

        if ($check) {
            $user = User::where('email', $email)->first();
            $accessToken = $user->createToken('user')->accessToken;
            return response()->json(['token' => $accessToken], 200);
        } else {
            return abort(401);
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('user.login'));
    }

    public function changePassword(Request $request)
    {

    }
}
