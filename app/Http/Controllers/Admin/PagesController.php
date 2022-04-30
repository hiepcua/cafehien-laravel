<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    function blank()                                {return view('pages.blank');}
    function searchresults()                        {return view('pages.searchresults');}
    function profile()                              {return view('pages.profile');}
    function invoices()                             {return view('pages.invoices');}
    function invoicesview()                         {return view('pages.invoicesview');}
    function gallery()                              {return view('pages.gallery');}
    function timeline()                             {return view('pages.timeline');}
    function pricing()                              {return view('pages.pricing');}
    function settings()                             {return view('pages.settings');}
}