<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TailwindcssController extends Controller
{
    public function index()
    {
        return view('tailwindcss.index');
    }
}
