<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AccountController extends Controller
{
    public function getLogin(){
        return view('login');
    }
}
