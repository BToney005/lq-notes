<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotesController extends Controller
{
    protected function index() {
        return view('notes/index');
    }
}
