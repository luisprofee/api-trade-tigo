<?php

namespace App\Http\Controllers;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected function jwt(User $user)
    {
    	$datos = [
    	'name' 		    =>	$user->name,
    	'email' 	    =>	$user->email,
		'id'			=>  $user->id,
		//'rol'           =>  $user->rol_id,
    	'iat' 			=> time(),
        'exp' 			=> time() + 60*60
    	];

    	return JWT::encode($datos, env('JWT_SECRET'));
    }

    public function login(Request $request)
    {
    	$user = User::where('email', $request->input('email'))->first();
    	if(!$user)	return response()->json(["status"=>400, "data"=>"El email no existe"],404);
    	

    	if(Hash::check($request->input('password'),$user->password))
    	{
    		return response()->json(["status"=>200, "token"=> $this->jwt($user)]);
    	}
		
    	return response()->json(["status"=> 400, "data" => "Credenciales incorrectas"],400);

    	

    }


}
