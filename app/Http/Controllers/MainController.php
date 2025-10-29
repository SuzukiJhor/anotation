<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    function index() {
        $userId = session('user.id');
        $user = User::find($userId)->toArray();
        $notes = User::find($userId)->notes()->get()->toArray();
        return view('home', ['notes'=> $notes]);
    } 
    
    public function newNote() {
        echo 'Im create a new note';
    }

    public function editNote($id) {
        $idDecrypted = Crypt::decrypt($id);
        echo $idDecrypted;
    }

    public function deleteNote() {
        echo 'Im delete a new note';
    }
}
