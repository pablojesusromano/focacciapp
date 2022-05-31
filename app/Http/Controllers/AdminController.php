<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $datos['users']= User::paginate(20);
        return view('admin.userlist',$datos);
    }

    







}



