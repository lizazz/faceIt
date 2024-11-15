<?php

namespace Modules\KanyeWest\App\Http\Controllers;

use App\Http\Controllers\Controller;

class KanyeWestController extends Controller
{
    public function index()
    {
        return view('kanyewest::index');
    }
}
