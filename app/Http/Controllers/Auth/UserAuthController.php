<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        $data = $validator->getData();
        $data['password'] = bcrypt($request->password);
        $data['role'] = 'customer';

        $user = User::create($data);

        $token = $user->createToken('API Token')->accessToken;

        return response(['user' => $user, 'token' => $token, 'message' => 'Registration Successful']);

    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) {
            return response(['error_message' => 'Incorrect Details.
            Please try again']);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

        return response(['user' => auth()->user(), 'token' => $token, 'message' => 'Login Successful']);

    }
    public function createSeller(Request $request)
    {

        if (Gate::allows('isAdmin')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed'
            ]);
            $data = $validator->getData();
            $data['password'] = bcrypt($request->password);
            $data['role'] = 'seller';

            $user = User::create($data);

            $token = $user->createToken('API Token')->accessToken;

            return response(['user' => $user, 'token' => $token, 'message' => 'Registration Successful']);
        }
    }

}
