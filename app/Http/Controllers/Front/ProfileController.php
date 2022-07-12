<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    /*
     * @param \App\Models\User $user
     * @return \Illuminiate\Http\Response
     */
    public function show(User $user): \Inertia\Response
    {
        // you can do anything now, i ok sure thankks
        return Inertia::render('User/Profile/Show', [
            'profile' => $user,
        ]);

    }
}
