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
        parent::__construct('admin');

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
        // TODO zobrazit ikony 'devicon' v seznamu
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

        $note = new Note();
        $note->update($request->except('_token'));

        return redirect()->route('admin.notes')->with('status', "Nová textová položka byla úspěšně vytvořena.");
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

        return redirect()->route('admin.notes')->with('status', "Text s ID {$note->id} byl úspěšně upraven.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $id = $note->id;
        $note->delete();

        return redirect()->route('admin.notes')->with('status', "Text s ID $id byl úspěšně odstraněn.");
    }
}
