<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    private $rules;

    public function __construct()
    {
        parent::__construct(['isAdmin' => true]);

        $this->rules = [
            'title' => 'required|max:190',
            'description' => 'required|max:190',
            'figure' => 'nullable|max:190',
        ];

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->addArg('noteList', Note::all());

        return view('admin.tables.note', $this->getArgs());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->addArg('note');

        return view('admin.forms.note', $this->getArgs());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        $this->addArg('note', $note);

        return view('admin.forms.note', $this->getArgs());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        };

        $note = Note::create($request->except('_token'));

        return redirect()->route('admin.notes')->with('status', "Nová textová položka s ID {$note->id} byla vytvořena.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        };

        $note->update($request->except('_token'));

        return redirect()->route('admin.notes')->with('status', "Textová položka s ID {$note->id} byla upravena.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $id = $note->id ?? 0;;

        if ($note->delete()) {
            return redirect()->route('admin.notes')->with('status', "Textová položka s ID $id byla odstraněna.");
        }

        return redirect()->route('admin.notes')->with('status', "ID $id: nenalezeno");
    }
}
