<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', [
            'list' => User::all(),
        ]);
    }

    public function show(User $user)
    {
        return view('admin.user.show', [
            'model' => $user,
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.user.form', [
            'model' => new User(session()->get('_old_input') ?? []),
        ]);
    }

    public function store(Request $request)
    {
        User::create($this->validateRequest($request, [
            'password' => [
                'required',
//                Password::min(8)
//                    ->mixedCase()
//                    ->numbers()
//                    ->symbols()
//                    ->uncompromised(),
            ]
        ]));

        return redirect()
            ->route('admin.users.index')
            ->with('success', trans('admin.saved'));
    }

    protected function prepareData($data)
    {
        if($data['new_password']){
            $data['password'] = Hash::make($data['new_password']);
        }

        return $data;
    }

    protected function validateRequest(Request $request, $validationArray = [])
    {
        return $request->validate(array_merge([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ], $validationArray));
    }

    public function edit(User $user)
    {
        return view('admin.user.form', [
            'model' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($this->validateRequest($request, [
            'password' => [
                'nullable',
//                Password::min(8)
//                    ->mixedCase()
//                    ->numbers()
//                    ->symbols()
//                    ->uncompromised(),
            ]
        ]));

        return redirect()
            ->route('admin.users.index')
            ->with('success', trans('admin.saved'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()
            ->route('admin.users.index')
            ->with('success', trans('admin.record_deleted'));
    }
}
