<?php

namespace App\Http\Controllers\API;

use App\Actions\Fortify\PasswordValidationRules;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    use PasswordValidationRules;

    //login user
    public function login(Request $request)
    {
        try {

            // validasi input
            $request->validate(
                [
                    'email' => 'email|required',
                    'password' => 'required'
                ]
            );

            // cek credentials(login)
            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 500);
            }

            //jika hash password tidak sesuai maka balikan error
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            //membuat token
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                "message" => "Something went wrong",
                "error" => $error
            ], 'Authentication Failed', 500);
        }
    }


    //register user
    public function register(Request $request)
    {
        try {

            //validasi
            $request->validate(
                [
                    'name' => 'string|required',
                    'email' => 'email|required',
                    'password' => 'required|min:8'
                ]
            );


            $roles = $request->input('roles', 'Customer');


            //create user
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
                'roles' => $roles
            ]);

            //mengambil data user berdasarkan email
            $user = User::where('email', $request->email)->first();

            //membuat token
            $tokenResult = $user->createToken('authToken')->plainTextToken;

            //mengembalikan data ketika berhasil register
            return ResponseFormatter::success(
                [
                    "access_token" => $tokenResult,
                    "token_type" => "Bearer",
                    "user" => $user
                ],
                'Success Register'
            );
        } catch (Exception $error) {
            //mengembalikan error 500 jika tidak berhasil
            return ResponseFormatter::error(
                [
                    "message" => "Something went wrong",
                    "error" => $error
                ],
                "Authentiaction Failed",
                500
            );
        }
    }
}
