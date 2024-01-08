<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesterController extends Controller
{
    // testar se ha um post
    public function index()
    {
        return response()->json([
            'message' => 'success'
        ]);
    }

    public function store()
    {
        echo "aoisjdo";
    }
}
