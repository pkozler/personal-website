<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{
    private $rules;

    public function __construct()
    {
        parent::__construct(['isAdmin' => true]);

        $this->rules = [
            'attr_ref' => 'required|max:190',
            'text_val' => 'required|max:190',
            'attr_id' => 'nullable|max:190',
            'attr_icon' => 'nullable|max:190',
        ];

        $this->middleware('auth')->except('refs');
    }

    public function refs()
    {
        return Link::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->addArg('linkList', Link::all());
        return view('admin.tables.link', $this->getArgs());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->addArg('link');

        return view('admin.forms.link', $this->getArgs());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        $this->addArg('link', $link);

        return view('admin.forms.link', $this->getArgs());
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

        $link = new Link();
        $link->update($request->except('_token'));

        return redirect()->route('admin.links')->with('status', "Nový kontaktní údaj byla úspěšně vytvořen.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        };

        $link->update($request->except('_token'));

        return redirect()->route('admin.links')->with('status', "Odkaz s ID {$link->id} byl úspěšně upraven.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $id = $link->id;
        $link->delete();

        return redirect()->route('admin.links')->with('status', "Odkaz s ID {$id} byl úspěšně odstraněn.");
    }
}
