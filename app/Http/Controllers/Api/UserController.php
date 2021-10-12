<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPUnit\Util\Exception;


class UserController extends Controller

{
    public function list (Request $request){
        $categories = User::all();
        foreach ($categories as $category){
            $img = $category->images;
        }
        //  $data = array_merge($categories,$img);
        return response()->json(['user' => $categories,$img]);
    }

    public function register(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'name' => 'required',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|min:6',
//            'c_password' => 'required|same:password',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json(['error' => $validator->errors()], 401);
//        }

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        try {
            $data = request()->only(['name', 'email', 'password']);
            $data['password'] = Hash::make($data['password']);
            $data['email_verified_at'] = Carbon::now();
            User::create($data);
        } catch (Exception $e) {
            return response()->json(['error','đăng lý thất bại'],500);
        }
        return response()->json(['success', 'đăng ký thành công'], 200);

        //GỬI EMAIL MÃ OTP VỀ ĐỊA CHỈ MAIL NGƯỜI DÙNG
//             $random = Str::random(6);
        //gọi đến gửi mail
    }

    /*  public function resendOTP(Request $request)
      {
          //gửi lại OTP dựa theo email
      }*/


    /*  public function verifyEmail(Request $request)
      {
          $email = $request->input('email');
          $otp = $request->input('otp');
          return response()->json(['success', 'Xác thực email thành công'], 200);
      }*/


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
        if (auth()->user()) {
            $user = auth()->user();
            $user->token()->revoke(); // clear api token
            $user->save();

            return response()->json([
                'message' => 'đăng xuất thành công',
            ]);
        }

    }

    public function changePassword(Request $request)
    {
//       $request->validate([
//           'current_password'=>'required',
//           'new_password'=>'required|min:6'
//       ]);
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            return response()->json(['message','mật khẩu hiện tại của bạn không khớp với mật khẩu cung cấp'],400);
        }
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();
        return response()->json(['message','thay đổi mật khẩu thành công'],200);
    }
}
