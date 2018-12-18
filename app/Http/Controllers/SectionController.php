<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    private $rules;

    public function __construct()
    {
        parent::__construct(['isAdmin' => true]);

        $this->rules = [
            'attr_id' => 'required|max:190',
            'nav_title' => 'required|max:190',
            'heading' => 'nullable|max:190',
            'paragraph' => 'nullable|max:190',
            'next_label' => 'nullable|max:190',
            'bg_image_path' => 'nullable|max:190',
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
        return view('admin.tables.section', $this->getArgs());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $this->addArg('section', $section);

        return view('admin.forms.section', $this->getArgs());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Section $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        };

        $section->update($request->except('_token'));

        return redirect()->route('admin.sections')->with('status', "Sekce s ID {$section->id} byla úspěšně upravena.");
    }

}
