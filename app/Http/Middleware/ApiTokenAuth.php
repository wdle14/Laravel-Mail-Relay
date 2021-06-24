<?php

namespace App\Http\Middleware;

use Closure;

class ApiTokenAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty($request->bearerToken())) {
			return response()->json([
				'res_code'  => '403',
				'message'   => 'Anda tidak memiliki akses'
			], 403);
        }
        // dd($request->bearerToken());
        $token = \App\Models\Token::where('token', $request->bearerToken())->first();
        if(!empty($token)){
            $token->hit = $token->hit+1;
            $token->save();
        }else if(empty($token)) {
			return response()->json([
				'res_code'  => '403',
				'message'   => 'Anda tidak memiliki akses'
			], 403);
        }
        // $request->merge(array('user_auth' => $user));
        return $next($request);
    }
}
