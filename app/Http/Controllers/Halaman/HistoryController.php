<?php

namespace App\Http\Controllers\Halaman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    function index()
    {
        return view('Halaman.History_lelang.index');
    }
}
