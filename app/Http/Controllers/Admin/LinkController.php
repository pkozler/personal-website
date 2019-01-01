<?php

namespace App\Http\Controllers\Admin;

use App\Link;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LinkController extends AdminController
{

    const
        PAGE = 'links';

    private $rules = [
        'attr_ref' => 'required|max:190',
        'text_val' => 'required|max:190',
        'attr_id' => 'nullable|max:190',
        'attr_icon' => 'nullable|max:190',
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
        $linkList = Link::all();

        return $this->getListView(compact('hasTable','linkList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = null;

        return $this->getFormView(compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        $item = $link;

        return $this->getFormView(compact('item'));
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

        $link = Link::create($request->except('_token'));

        return redirect()->route('links')->with('status', "Nový kontaktní údaj s ID {$link->id} byl vytvořen.");
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

        return redirect()->route('links')->with('status', "Kontaktní údaj s ID {$link->id} byl upraven.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $id = $link->id ?? 0;

        if ($link->delete()) {
            return redirect()->route('links')->with('status', "Kontaktní údaj s ID $id byl odstraněn.");
        }

        return redirect()->route('links')->with('status', "ID $id: nenalezeno");
    }

}
