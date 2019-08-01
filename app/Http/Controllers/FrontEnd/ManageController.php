<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageController extends Controller
{
    public function getDashboard(){
        return view('FrontEnd.manage.dashboard');
    }
}
