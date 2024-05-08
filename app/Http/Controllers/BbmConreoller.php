<?php

namespace App\Http\Controllers;

use App\Models\Bbm;
use Illuminate\Http\Request;

class BbmConreoller extends Controller
{
    public function index()
    {
        $data = Bbm::all();
        return view('bbm.index', compact('data'));
    }
}
