<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class AppController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'x.*' => 'required|numeric',
            'y.*' => 'required|numeric',
        ]);

        return 'success';
    }
}
