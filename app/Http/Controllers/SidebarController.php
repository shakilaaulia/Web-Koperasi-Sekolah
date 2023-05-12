<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SidebarController extends Controller
{
    public function sidebar()
    {      
        return view('sidebar');
    }
}
