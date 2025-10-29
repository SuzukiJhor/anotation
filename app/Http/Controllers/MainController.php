<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index() {
        // load user's notes
        return view('home');
    } 
    
    public function newNote() {
        echo 'Im create a new note';
    }
}
