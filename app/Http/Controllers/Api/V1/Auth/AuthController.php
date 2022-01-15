<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\V1\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\CheckEmailRequest;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;
use App\Http\Resources\Api\V1\Auth\UserLoginResource;
use App\Services\TokenProviderService;
use App\Swagger\Interfaces\AuthControllerInterface;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Client;


class AuthController extends Controller implements AuthControllerInterface
{
    use CoreJsonResponse ,SendsPasswordResetEmails;

    /**
     * Login
     */

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if($user){
            if($user->email_verified_at == null){
                return $this->invalidRequest([__('verfication.pending')]);
            }

            $clientAuth = Client::where('provider', 'users')->first();
            $credentials = [
                'email' => $user->email,
                'password' => $request->input('password'),
                'client_id' => $clientAuth->id,
                'client_secret' => $clientAuth->secret,
            ];

            $authResponse = TokenProviderService::issueUserToken($credentials);
            if ($authResponse === 400) {
                return $this->unauthorized();
            }
            return $this->token($authResponse, (new UserLoginResource($user))->resolve());
        }
        return $this->unauthorized();
    }

    /**
     * Register
     */

    public function register(RegisterRequest $request)
    {
        $request = $request->validated();

        $user = User::create([
            'first_name' => $request['first_name'],
            // 'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'mobile' => $request['mobile'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'grade_id' => $request['grade_id'],
            // 'parent_number' => $request['parent_number'],
            // 'dob' => $request['dob']
        ]);

        $user->sendEmailVerificationNotification();

        return $this->ok([__('verfication.confirm')]);
    }


    public function checkEmail(CheckEmailRequest $request)
    {
        $emailExists = User::where('email', $request->input('email'))->exists();

        return $this->ok([
            "exists" => $emailExists
        ]);

    }


}
