<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PatronController extends Controller
{
    public function index()
    {
        return view('admin.users.patrons');
    }
}
