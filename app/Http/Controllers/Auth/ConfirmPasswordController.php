<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ConfirmPasswordController extends Controller
{
    /**
     * Show the confirm password form.
     */
    public function showConfirmForm()
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function confirm(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        if (!Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => [trans('auth.password')],
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended('/dashboard');
    }
}
