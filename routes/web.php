<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use \App\Models\User;
use Laravel\Sanctum\Contracts\HasApiTokens;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/setup',function(){
    $credentials = [
        'email' =>'admin@admin.com',
        'password' => 'password'
    ];
    try {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Define constants for token names
            $TOKEN_NAMES = [
                'admin-token' => ['create', 'update', 'delete'],
                'update-token' => ['create', 'update'],
                'basic-token' => []
            ];

            $tokens = [];
            foreach ($TOKEN_NAMES as $name => $abilities) {
                $token = $user->createToken($name, $abilities);
                $tokens[$name] = $token->plainTextToken;
            }

            // Add comments to describe the response format
            // Return response with tokens and redirect to setup page
            return [
                'tokens' => $tokens,

            ];
        } else {
            // Handle failed authentication
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    } catch (\Exception $e) {
        // Handle any exceptions thrown by Auth::attempt()
        return response()->json(['message' => $e->getMessage()], 500);
    }
});

