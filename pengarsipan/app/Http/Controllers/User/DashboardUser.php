<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardUser extends Controller
{
    function index()
    {
        return view("user/dashboard/index");
    }
}