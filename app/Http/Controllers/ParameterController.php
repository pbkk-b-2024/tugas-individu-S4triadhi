<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParameterController extends Controller
{
    public function index($param1 = null, $param2 = null)
    {
        return view('parameter.index', compact('param1', 'param2'));
    }
    
    public function store(Request $request, $param1 = null, $param2 = null)
    {
        $newParam1 = $request->input('param1', $param1);
        $newParam2 = $request->input('param2', $param2);
    
        // Redirect dengan parameter yang baru
        return redirect()->route('parameter.index', [
            'param1' => $newParam1,
            'param2' => $newParam2
        ]);
    }
    
}