<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppsController extends Controller
{
    function inbox()                        {return view('apps.inbox');}
    function inboxdetail()                  {return view('apps.inboxdetail');}
    function inboxcompose()                 {return view('apps.inboxcompose');}

    function chat()                         {return view('apps.chat');}
    function calendar()                     {return view('apps.calendar');}
    function events()                       {return view('apps.events');}
    function todolist()                     {return view('apps.todolist');}
    function filemanager()                  {return view('apps.filemanager');}
    function contacts()                     {return view('apps.contacts');}
    function scrumboard()                   {return view('apps.scrumboard');}
    function blog()                         {return view('apps.blog');}
    function social()                       {return view('apps.social');}
}
