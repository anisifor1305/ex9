<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index() {
        $resp = Gate::authorize('viewAny', User::class);
        if ($resp->allowed()) {
            $users = User::all();
            return response()->json(['status'=>'ok', 'users'=>$users]);

        } else {
            return response()->json(['status'=>'not ok']);
        }
    }


}
