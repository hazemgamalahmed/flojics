<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data =  $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => ['sometimes', 'confirmed'],
            'phone'  => 'required|regex:/^(\+)[0-9]{10,15}$/'

        ]);
    //    $user =  User::Create($data);
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = \Hash::make($request->password);
    $user->phone = $request->phone;
    $user->save();
        return response()->json([
            'message' => 'you are register successfully',
            'token' => $user->createToken('user_token', ['server:show'])->plainTextToken
        ], 201);
    }

    public function Login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $data['email'])->first();
        if(is_null($user) || !\Hash::check($data['password'], $user->password))
        {
            return response()->json([
                'message' => "your login is faild"
            ]);
        }

        return response()->json([
            'message' => 'login successfully',
            'token' => $user->createToken('user_token', ['server:show'])->plainTextToken,
        ]);
    }
}
