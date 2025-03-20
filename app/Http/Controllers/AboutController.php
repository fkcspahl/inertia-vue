<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutController extends Controller
{
    //
    public function __invoke(Request $request) {
        $user = User::find(1);

        return Inertia::render('About', [
            'user' => $user
        ]);
    }

    public function update(Request $request) {
        $user = User::find(1);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('about')->with('success', 'User updated.');
    }
}
