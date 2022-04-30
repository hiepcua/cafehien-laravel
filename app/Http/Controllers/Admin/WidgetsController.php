<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class WidgetsController extends Controller
{
    function widget()                        {return view('widgets.widget');}
}
