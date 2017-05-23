<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Dingo\Api\Http\Request;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use JWTException;
use JWTAuth;
use Mockery\Exception;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest');
//    }

    public function authenticate(Request $request){
        $credentials = $request->only('email','password');
        try{
            if(! $token = JWTAuth::attempt($credentials)){
                return $this->response->errorUnauthorized();
            }
        }
        catch(JWTException $ex){
            return $this->response->errorInternal();
        }
        return $this->response->array(compact('token'))->setStatusCode(200);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function index(){
        try{
            return User::all();
        }
        catch(Exception $ex){
            return $ex;
        }
    }

    public function show(){

        try{
            $user = JWTAuth::parseToken()->toUser();
            if(!$user){
                return $this->response->errorNotFound("User not found");
            }
        }
        catch(\Tymon\JWTAuth\Exceptions\TokenInvalidException $ex){
            return $this->response->error("Token is invalid");
        }
        catch(\Tymon\JWTAuth\Exceptions\TokenExpiredException $ex){
            return $this->response->error("Token is expired");
        }
        catch(\Tymon\JWTAuth\Exceptions\TokenBlacklistedException $ex){
            return $this->response->error("Token is blacklisted");
        }
        return $this->response->array(compact('user'))->setStatusCode(200);
    }

    public function getUserToken(){
        $token = JWTAuth::getToken();

        if(!$token){
            return $this->response->errorUnauthorized("Token is invalid");
        }

        try {
            $refreshedToken= JWTAuth::refresh($token);
        }
        catch(\Tymon\JWTAuth\Exceptions\JWTException $ex){
            $this->response->error("Something went wrong");
        }
        return $refreshedToken;
    }
}
