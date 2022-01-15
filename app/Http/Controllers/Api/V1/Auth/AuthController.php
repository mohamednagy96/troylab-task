<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\V1\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Client;


class AuthController extends Controller
{
    use CoreJsonResponse;

    /**
     * Login
     */

    public function login(LoginRequest $request){
        if(Auth::guard('admin')->attempt(['email' =>$request->email,'password'=>$request->password])){
            $user = Auth::guard('admin')->user();
                $success=[
                'id'=>$user->id,
                'name'=>$user->name,
                'email'=>$user->email,
            ];
            $success['token'] = $user->createToken('admin')->accessToken;
            return $this->ok($success);
        }else{
            return $this->notFound(['please make check for youe email and password']);
            }
        }

}
