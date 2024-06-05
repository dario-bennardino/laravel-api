<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadController extends Controller
{

    //essendo una rotta in POST utilizzo request
    public function store(Request $request)
    {
        dd($request);
    }
}
