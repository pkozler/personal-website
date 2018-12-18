<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as ImageFacade;

class ImageController extends Controller
{
    private $rules;
    private $uploadConfig;

    public function __construct()
    {
        parent::__construct(['isAdmin' => true]);

        $this->rules = [
            'path' => 'required|max:190',
            'label_name' => 'required|max:190',
            'label_category' => 'nullable|max:190',
        ];

        $this->uploadConfig = parent::getUploadConfig(true);

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
        $this->addArg('thumbsPath', $this->uploadConfig->thumbnails);

        return view('admin.tables.image', $this->getArgs());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        $file = $this->handleImageUpload($request);
        $image = new Image($request->except('_token', 'path'));
        $image->path = $file->hashName();
        $image->save();

        return redirect()->route('admin.images')->with('status', "Nový obrázek s ID {$image->id} byl úspěšně vytvořen.");
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

        $file = $this->handleImageUpload($request);
        $image = new Image($request->except('_token', 'path'));
        $image->update(['path' => $file->hashName()]);

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
        $id = $image->id ?? 0;

        if ($image->delete()) {
            return redirect()->route('admin.images')->with('status', "Obrázek s ID $id byl úspěšně odstraněn.");
        }

        return redirect()->route('admin.images')->with('status', "ID $id: nenalezeno");
    }

    private function handleImageUpload($request) {
        if (!$request->hasFile('path')) {
            return;
        }

        $uploaded = $request->file('path');

        Storage::disk('public')->putFile($this->uploadConfig->fullsize, $uploaded);
        $cropped = ImageFacade::make($uploaded);

        $cropped->crop(
            $this->uploadConfig->tSize->width, $this->uploadConfig->tSize->height
        );

        Storage::disk('public')->put($this->uploadConfig->thumbnails . '/' . $uploaded->hashName(), $cropped);

        return $uploaded;
    }
}
