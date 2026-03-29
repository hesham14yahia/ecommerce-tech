<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    public function users()
    {
        return view('admin.users', [
            'title' => 'Users',
        ]);
    }

    public function bread()
    {
        return view('admin.bread', [
            'title' => 'BREAD',
        ]);
    }
}
