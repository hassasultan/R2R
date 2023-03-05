<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    //
     public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth()->guard('buyer_api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('buyer_api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('buyer_api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('buyer_api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('buyer_api')->factory()->getTTL() * 60
        ]);
    }

    // public function register(Request $request)
    // {
    //     $validator = $request->validate([
    //         'name' => 'required|string|between:2,100',
    //         'email' => 'required|string|email|max:100|unique:users',
    //         'password' => 'required|string|min:6',
    //     ]);

    //     try
    //     {
    //         $data = $request->all();
    //         $data["role"] = "buyer";
    //         $data["password"] =  bcrypt($request->password);
    //         $user = User::create($data);

    //         return response()->json([
    //             'message' => 'Seller successfully registered',
    //             'user' => $user
    //         ], 201);
    //     }
    //     catch(Exception $ex)
    //     {
    //         return response()->json($ex, 400);
    //     }

    // }
}
