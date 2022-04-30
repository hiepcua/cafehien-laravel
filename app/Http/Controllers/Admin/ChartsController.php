<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ChartsController extends Controller
{
    function apex()                        {return view('charts.apex');}
    function c_chart()                     {return view('charts.c_chart');}
    function morris()                      {return view('charts.morris');}
    function flot()                        {return view('charts.flot');}
    function chartjs()                     {return view('charts.chartjs');}
    function knob()                        {return view('charts.knob');}
    function sparkline()                   {return view('charts.sparkline');}
}