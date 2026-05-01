<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

public function register(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => [
            'required',
            'string',
            'email',
            'max:255',
            'unique:users',
            function ($attribute, $value, $fail) {
                $allowed = ['@s.diu.edu.bd', '@diu.edu.bd'];
                $valid = false;
                foreach ($allowed as $domain) {
                    if (str_ends_with(strtolower($value), $domain)) {
                        $valid = true;
                        break;
                    }
                }
                if (!$valid) {
                    $fail('Only Daffodil International University email addresses are allowed (@s.diu.edu.bd or @diu.edu.bd).');
                }
            },
        ],
        'password' => 'required|string|min:8|confirmed',
    ]);

    $role = 'student';

    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'role'     => $role,
    ]);

    Auth::login($user);

    return redirect()->route('home')->with('success', 'Welcome to FindIt, ' . $user->name . '!');
}
}