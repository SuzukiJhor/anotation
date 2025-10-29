<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function index() {
        echo 'im inside in the App';
    } 
    
    public function newNote() {
        echo 'Im create a new note';
    }
}
