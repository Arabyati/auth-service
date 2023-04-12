<?php

namespace Arabyati\Auth\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    static public function user($token)
    {

        if($token == '')
        {
            return response()->json(['error' => 'Unauthorised'], 401);
        }

        $response = Http::withToken($token)
        ->timeout(5)
        ->accept('application/json')
        ->get(env('API_TARGET_URL'));

        return $response;

    }
}
