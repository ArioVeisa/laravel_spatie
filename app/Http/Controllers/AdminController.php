<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin'); // Middleware digunakan di controller constructor
    }

    public function index()
    {
        return 'Welcome Admin';
    }
}
