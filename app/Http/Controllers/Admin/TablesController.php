<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TablesController extends Controller
{
    function normal()                        {return view('tables.normal');}
    function datatable()                     {return view('tables.datatable');}
    function editable()                      {return view('tables.editable');}
    function tablecolor()                    {return view('tables.tablecolor');}
    function filter()                        {return view('tables.filter');}
    function dragger()                        {return view('tables.dragger');}
}
