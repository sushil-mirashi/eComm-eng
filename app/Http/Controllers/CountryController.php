<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
    function index()
    {
        $data = array_unique($this->simpleGet('https://countrycode.dev/api/countries'));
        return view('country', compact('data'));
    }

    function getCountryCode($name)
    {
        $data = $this->simpleGet('https://countrycode.dev/api/countries/' . $name);
        return $data;
    }

    function simpleGet($url)
    {
        $countries = Http::get($url);
        // ->withOptions(['debug' => true])
        // ->get();
        return $countries->json();
    }
}