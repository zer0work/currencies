<?php

namespace App\Http\Controllers;

class CurrenciesController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function get()
    {
        return file_get_contents('http://phisix-api3.appspot.com/stocks.json');
    }
}
