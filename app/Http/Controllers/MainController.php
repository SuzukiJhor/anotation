<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index() {
        echo 'inside APp';
    } 
    
    public function newNote() {
        echo 'create a new note';
    }
}
