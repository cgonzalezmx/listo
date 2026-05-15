<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function invite()
    {
        $inviteUrl = URL::temporarySignedRoute('register', now()->plus(hours: 2));
        return response()->json(['invite_url' => $inviteUrl]);
    }
}
