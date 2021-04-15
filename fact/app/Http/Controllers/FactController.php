<?php

namespace App\Http\Controllers;

use App\Models\Facts;
use Illuminate\Http\Request;

class FactController extends Controller
{
    public function index()
    {
        $items = Facts::all();
        return view('index', compact('items'));
//        return view('index', array('name' => 'Galimiy Fact'));
    }
}
