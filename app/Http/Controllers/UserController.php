<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
       public function getusers(Request $request)
    {
        // 1. Find the driver by their ID, or throw an error if they don't exist
        $users = User::all();

    

        // 4. Return a successful confirmation response back in JSON format
        return response()->json([
            'message' => 'the users retrieved successfully!',
            'users' => $users
        ], 200);
    }
}
