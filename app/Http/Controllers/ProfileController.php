<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
{
    $user = User::findOrFail(Auth::id());

    $user->update([
        'name'  => $request->name,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
    ]);

    if ($request->password) {
        $user->update([
            'password' => bcrypt($request->password),
        ]);
    }

    return redirect()->route('profile.show');
}

}