<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\LoginUser;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * Method registerUser
     *
     * @param RegisterRequest $request
     *
     * @return void
     */
    public function registerUser(RegisterRequest $request)
    {
        $input = $request->only(['name', 'email', 'user_type']) + ['password' => Hash::make($request->get('password'))];
        User::create($input);
        return redirect('register')->with('success',  __('Your are successfully registered!'));
    }

    /**
     * Method loginUser
     *
     *
     * @param  \App\Http\Requests\LoginUser $request
     * @return Illuminate\Http\Response
     */
    public function loginUser(UserLoginRequest $request)
    {
        $input = $request->only(['email', 'password']);
        $user = User::where('email', $input['email'])->first();
        if (!$user) return redirect('login')->with('error', __('Invalid Credentials'));

        if (!Hash::check($input['password'], $user->password))  return redirect('login')->with('error', __('Invalid Email and Password!'));

        Auth::login($user);
        // Auth::attempt(['email' => $input['email'], 'password' =>  $user->password]);
        if ($user->user_type == 'USER') {
            return redirect('products/index');
        } else {
            return redirect('admin/products');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
