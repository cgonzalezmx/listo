<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function store()
    {
        $invitation = new Invitation();
        $invitation->expires_at = now()->addSeconds(config('settings.invitate_ttl', 3600));
        $invitation->save();
        return response()->json([
            'url_id' => $invitation->id,
        ]);
    }
}
