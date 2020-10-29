<?php   
namespace App\Http\Controllers;

    use App\User;
    use Illuminate\Http\Request;
    use JWTAuth;
    use Tymon\JWTAuth\Exceptions\JWTException;
    use Tymon\JWTAuth\Contracts\JWTSubject;

class Login extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $usuario = User::select('id')->where('email', $request->email)->get();
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
       // $us = json_encode($usuario)
        return response()->json(compact('token')+compact('usuario') );
        // $token =  [
        //     'token' => $token,
        //     'email' => $request->email
        // ];
        // return json_encode($usuario + $token);
    }

    
    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 404);
            }
            } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                    return response()->json(['token_expired'], $e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                    return response()->json(['token_invalid'], $e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                    return response()->json(['token_absent'], $e->getStatusCode());
            }
            return response()->json(compact('user'));
    }
}
     