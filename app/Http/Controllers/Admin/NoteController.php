<?php

namespace App\Http\Controllers\Admin;

use App\Note;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends AdminController
{

    const
        PAGE = 'notes';

    private $rules = [
        'title' => 'required|max:190',
        'description' => 'required|max:190',
        'figure' => 'nullable|max:190',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(self::PAGE);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hasTable = true;
        $noteList = Note::all();

        return $this->getListView(compact('hasTable','noteList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $note = null;

        return $this->getFormView(compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return $this->getFormView(compact('note'));
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

        return redirect()->route('admin.notes.index')->with('status', "Nová textová položka s ID {$note->id} byla vytvořena.");
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

        return redirect()->route('admin.notes.index')->with('status', "Textová položka s ID {$note->id} byla upravena.");
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
            return redirect()->route('admin.notes.index')->with('status', "Textová položka s ID $id byla odstraněna.");
        }

        return redirect()->route('admin.notes.index')->with('status', "ID $id: nenalezeno");
    }

}
