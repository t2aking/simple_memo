<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorChallengeController extends Controller
{
    /**
     * Show the two-factor authentication challenge view.
     */
    public function create()
    {
        return view('auth.two-factor-challenge');
    }

    /**
     * Handle an incoming two-factor authentication challenge.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required_without:recovery_code',
            'recovery_code' => 'required_without:code',
        ]);

        $user = Auth::user();

        if ($request->code) {
            if (! $user->verifyTwoFactorCode($request->code)) {
                return back()->withErrors(['code' => __('The provided two-factor authentication code was invalid.')]);
            }
        } elseif ($request->recovery_code) {
            if (! $user->verifyRecoveryCode($request->recovery_code)) {
                return back()->withErrors(['recovery_code' => __('The provided recovery code was invalid.')]);
            }
        }

        Auth::login($user);

        return redirect()->intended(config('fortify.home'));
    }
}
