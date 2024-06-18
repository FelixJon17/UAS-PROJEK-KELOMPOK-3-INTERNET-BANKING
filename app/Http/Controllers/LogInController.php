<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LogInController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_proses(Request $request)
    {
        $username = $request->input('username');
        $pin = $request->input('pin');

        $account = Account::where('username', $username)->first();

        if ($account && Hash::check($pin, $account->pin)) {
            // Login sukses
            $request->session()->regenerate();
            return redirect()->intended(route('home', ['id' => $account->id], absolute: true));
        } else {
            // Login gagal, kembali ke main dengan error message
            return redirect()->route('login')->with('error', 'Username atau PIN salah.');
        }
    }
}
