<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Operations;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    function index()
    {
        $userId = session('user.id');
        $user = User::find($userId)->toArray();
        $notes = User::find($userId)->notes()->get()->toArray();
        return view('home', ['notes' => $notes]);
    }

    public function newNote()
    {
        echo 'Im create a new note';
    }

    public function editNote($id)
    {
        $id = Operations::decryptId($id);
        echo 'Im edit a  note with id: ' . $id;
    }

    public function deleteNote($id)
    {
        $id = Operations::decryptId($id);
        echo 'Im delete a  note with id: ' . $id;
    }
}
