<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\Models\User;   

class AuthController extends Controller
{
    public function checkUser(Request $request)
    {
        $contact = $request->input('contact');
        $user = User::where('email', $contact)->orWhere('phone', $contact)->exists();
        if($user){
            return response()->json(['message'=>'User already exists'], 400);
        }
        return response()->json(['message'=>'User does not exist'], 404);
    }
}
