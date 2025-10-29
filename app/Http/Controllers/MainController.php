<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Http\Request;
class MainController extends Controller
{
    function index()
    {
        $userId = session('user.id');
        $user = User::find($userId)->toArray();
        $notes = User::find($userId)->notes()->whereNull('deleted_at')->get()->toArray();
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

        $userId = session('user.id');
        $newNote = new Note();
        $newNote->user_id = $userId;
        $newNote->title = $request->text_title;
        $newNote->text = $request->text_note;#
        $newNote->save();
        return redirect()->route('home');
    }

    public function editNote($id)
    {
        $id = Operations::decryptId($id);
        if ($id === null) {
            return redirect()->route('home');
        }
        $note = Note::find($id);
       return view('edit_note', ['note' => $note]);
    }

    public function editNoteSubmit(Request $request)
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

        if($request->note_id == null){
            return redirect()->route('home');
        }
        
        $id = Operations::decryptId($request->note_id);
        if ($id === null) {
            return redirect()->route('home');
        }
        $note = Note::find($id);

        $note->title = $request->text_title;
        $note->text = $request->text_note;#
        $note->save();
        return redirect()->route('home');
    }

    public function deleteNote($id)
    {
        $id = Operations::decryptId($id);
        if ($id === null) {
            return redirect()->route('home');
        }
        $note = Note::find($id);

        return view('delete_note', ['note' => $note]);
   
    }
    public function deleteConfirm($id)
    {
        $id = Operations::decryptId($id);
        if ($id === null) {
            return redirect()->route('home');
        }
        $note = Note::find($id);
        $note->delete();
        return redirect()->route('home');
    }
}
