<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        return view('user.listado');
    }

    public function create(){

        return view('user.create');
    }

}
