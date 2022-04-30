<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ElementsController extends Controller
{
    function helperclass()                        {return view('elements.helperclass');}
    function bootstrap()                          {return view('elements.bootstrap');}
    function typography()                         {return view('elements.typography');}
    function tabs()                               {return view('elements.tabs');}
    function buttons()                            {return view('elements.buttons');}
    function icons()                              {return view('elements.icons');}
    function notifications()                      {return view('elements.notifications');}
    function colors()                             {return view('elements.colors');}
    function dialogs()                            {return view('elements.dialogs');}
    function listgroup()                          {return view('elements.listgroup');}
    function mediaobject()                        {return view('elements.mediaobject');}
    function modals()                             {return view('elements.modals');}
    function nestable()                           {return view('elements.nestable');}
    function progressbars()                       {return view('elements.progressbars');}
    function rangesliders()                       {return view('elements.rangesliders');}
}
