<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function __construct()
    {
        parent::__construct('admin');

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sections', $this->getArgs());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $current = Section::find($id);
        $this->addArg('currentSection', $current);

        return view('admin.forms.section', $this->getArgs());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $section = Section::find($id);
        $section->attr_id = $request->get('attr_id');
        $section->nav_title = $request->get('nav_title');
        $section->heading = $request->get('heading');
        $section->paragraph = $request->get('paragraph');
        $section->next_label = $request->get('next_label');
        $section->bg_image_path = $request->get('bg_image_path');
        $section->save();

        return redirect('admin')->with('success', 'Sekce byla upravena.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }
}
