<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    function setLocale($locale)
    {
        if (in_array($locale, \Config::get('app.locales'))) {  
            Session::put('locale', $locale);                   
        }
        return redirect()->back();  
    }
}
