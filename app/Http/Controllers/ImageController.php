<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    private $rules;

    public function __construct()
    {
        parent::__construct('admin');

        $this->rules = [
            'path' => 'required|max:190',
            'label_name' => 'required|max:190',
            'label_category' => 'nullable|max:190',
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
        // TODO zobrazit fotografie v seznamu do <img> elementu
        $this->addArg('imageList', Image::all());

        return view('admin.tables.image', $this->getArgs());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO implementovat nahrávání fotografií do adresáře
        $this->addArg('image');

        return view('admin.forms.image', $this->getArgs());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        $this->addArg('image', $image);

        return view('admin.forms.image', $this->getArgs());
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

        $image = new Image();
        $image->update($request->except('_token'));

        return redirect()->route('admin.images')->with('status', "Nový obrázek galerie byla úspěšně vytvořen.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        };

        $image->update($request->except('_token'));

        return redirect()->route('admin.images')->with('status', "Obrázek s ID {$image->id} byl úspěšně upraven.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $id = $image->id;
        $image->delete();

        return redirect()->route('admin.images')->with('status', "Obrázek s ID $id byl úspěšně odstraněn.");
    }
}
