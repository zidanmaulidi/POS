<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function foodBeverage()
    {
        return "foodbeverage";
    }

    public function beautyHealth()
    {
        return "beutyhealth";
    }

    public function homeCare()
    {
        return "homecare";
    }

    public function babyKid()
    {
        return "babykid";
    }
}
