<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutController extends Controller
{
    //
    public function __invoke(Request $request) {
        $user = User::firstOrNew(
            ['id' => 1],
            ['name' => 'John Doe', 'email' => 'j.doe@mail.com']
        );

        // Wenn kein User gefunden wurde, erstelle einen neuen

        return Inertia::render('About', [
            'user' => $user
        ]);
    }

    public function update(Request $request) {
        $user = User::firstOrNew(
            ['id' => 1],
            ['name' => 'John Doe', 'email' => 'j.doe@mail.com']
        );

        $user->name = $request->name;
        $user->email = $request->email;
        // Falls $user->password leer ist, muss ein default Passwort gesetzt werden
        if ($request->password) {
            $user->password = bcrypt("password");
        }
        
        $user->save();

        return redirect()->route('about')->with('success', 'User updated.');
    }
}
