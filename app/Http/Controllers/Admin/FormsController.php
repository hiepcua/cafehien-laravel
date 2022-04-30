<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    function formsbasic()                        {return view('forms.formsbasic');}
    function advanced()                          {return view('forms.advanced');}
    function validation()                        {return view('forms.validation');}
    function wizard()                            {return view('forms.wizard');}
    function dragdropupload()                    {return view('forms.dragdropupload');}
    function cropping()                          {return view('forms.cropping');}
    function summernote()                        {return view('forms.summernote');}
    function editors()                           {return view('forms.editors');}
    function markdown()                          {return view('forms.markdown');}
}
