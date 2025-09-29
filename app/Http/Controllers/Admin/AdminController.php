<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin.index', [
            'list' => Admin::where('id', '>', 1)->get(),
        ]);
    }

    public function show(Admin $admin)
    {
        return view('admin.admin.show', [
            'model' => $admin,
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.admin.form', [
            'model' => new Admin(session()->get('_old_input') ?? []),
        ]);
    }

    public function store(Request $request)
    {
        Admin::create($this->validateRequest($request, [
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
            ->route('admin.admins.index')
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

    public function edit(Admin $admin)
    {
        if($admin->id == 1)
            return redirect()->back();

        return view('admin.admin.form', [
            'model' => $admin,
        ]);
    }

    public function update(Request $request, Admin $admin)
    {
        $admin->update($this->validateRequest($request, [
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
            ->route('admin.admins.index')
            ->with('success', trans('admin.saved'));
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()
            ->route('admin.admins.index')
            ->with('success', trans('admin.record_deleted'));
    }
}
