<?php

namespace App\Services;

class AdminService
{
    // get options for select inputs
    public function getOptions(int $userId = null)
    {
        $admins = \App\Models\Admin::select(['id','name'])->get();

        return $admins->map(function ($admin) use ($userId) {
            return (object)[
                'value' => $admin->id,
                'title' => $admin->name,
                'selected' => $admin->id == $userId ? 'selected="selected"' : '',
            ];
        });
    }
}
