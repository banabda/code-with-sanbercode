<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function superadmin()
    {
        return "berhasil masuk sebagai superadmin";
    }
    public function admin()
    {
        return "berhasil masuk sebagai admin";
    }
    public function guest()
    {
        return "berhasil masuk sebagai guest";
    }
}
