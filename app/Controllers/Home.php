<?php

namespace App\Controllers;

class Home extends index
{
    public function index()
    {
        return view('welcome_message');
    }
}
