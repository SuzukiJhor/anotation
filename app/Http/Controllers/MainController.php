<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Operations;
use Illuminate\Http\Request;
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
        return view('new_note');
    }

    public function newNoteSubmit(Request $request)
    {
         $request->validate([
            'text_title' => 'required|min:3|max:200',
            'text_note' => 'required|min:3|max:300',
        ],
        [
            'text_title.required' => 'O Título é obrigatório',
            'text_password.required' => 'A senha é obrigatória',
            'text_title.min' => 'A senha deve ter pelo menos :min caracteres',
            'text_note.required' => 'A Nota é obrigatória',
            'text_note.min' => 'A nota deve ter pelo menos :min caracteres',
            'text_note.max' => 'A nota deve ter no máximo :max caracteres',
        ]);

        echo 'ok';
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
