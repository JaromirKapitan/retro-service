<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Rules\PasswordRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function create(Request $request)
    {
        return view('admin.password.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', new PasswordRule],
        ]);

        Auth::guard('admin')->user()->update([
            'password' => $data['password']
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', trans('admin.password_changed'));
    }
}
