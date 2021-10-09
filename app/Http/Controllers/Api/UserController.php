<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PHPUnit\Util\Exception;

class UserController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required:email',
            'password' => 'required|min:6'
           // 'c_password' => 'required:same:password'
        ]);

        try {
            $data = request()->only(['name', 'email', 'password']);
            $data['password'] = Hash::make($data['password']);
            $data['email_verified_at'] = Carbon::now();
            User::create($data);
            //GỬI EMAIL MÃ OTP VỀ ĐỊA CHỈ MAIL NGƯỜI DÙNG
            $random = Str::random(6);
            //gọi đến gửi mail
        } catch (Exception $e) {
            return response()->json('error', 500);
        }
        return response()->json(['success', 'đăng ký thành công'], 200);
    }

    public function resendOTP(Request $request)
    {
        //gửi lại OTP dựa theo email
    }


    public function verifyEmail(Request $request)
    {
        $email = $request->input('email');
        $otp = $request->input('otp');
        return response()->json(['success', 'Xác thực email thành công'], 200);
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
        $request->user()->token()->revoke();//cập nhật lại cái token của user
        //Auth::logout();
        //return redirect(route('user.login'));
        return response()->json(['token' => 'Đăng xuất thành công'], 200);
    }

    public function changePassword(Request $request)
    {

    }
}
