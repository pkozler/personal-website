<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as ImageFacade;

class ImageController extends AdminController
{

    const
        PAGE = 'images';

    private $storePath = 'app/public/';
    private $rules = [
        'label_name' => 'required|max:190',
        'label_category' => 'nullable|max:190',
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
        $imageList = Image::all();

        return $this->getListView(compact('hasTable', 'imageList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image = null;

        return $this->getFormView(compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return $this->getFormView(compact('image'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->rules['path'] = 'required';
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        };

        $file = $this->handleImageUpload($request);
        $image = new Image($request->except('_token', 'path'));
        $image->path = $file->hashName();
        $image->save();

        return redirect()->route('admin.images.index')->with('status', "Nový obrázek galerie s ID {$image->id} byl vytvořen.");
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

        $file = null;

        if ($request->hasFile('path')) {
            $file = $this->handleImageUpload($request);
        }

        if ($file) {
            $this->handleImageDelete($image);
            $image->path = $file->hashName();
        }

        $image->update($request->except('_token', 'path'));

        return redirect()->route('admin.images.index')->with('status', "Obrázek galerie s ID {$image->id} byl upraven.");
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

        $deleted = $this->handleImageDelete($image);

        if ($deleted) {
            $image->delete();

            return redirect()->route('admin.images.index')->with('status', "Obrázek galerie s ID $id byl odstraněn.");
        }

        return redirect()->route('admin.images.index')->with('status', "ID $id: nenalezeno");
    }

    private function handleImageDelete($image) {
        $path = $image->path ?? null;

        if (!$path) {
            return false;
        }

        Storage::disk('public')->delete([
            $this->uploadConfig->fullsize . '/' . $path,
            $this->uploadConfig->thumbnails . '/' . $path
        ]);

        return true;
    }

    private function handleImageUpload($request) {
        $uploaded = $request->file('path');

        if (!$uploaded) {
            return null;
        }

        Storage::disk('public')->putFile($this->uploadConfig->fullsize, $uploaded);
        $cropped = ImageFacade::make($uploaded);

        $cropped->crop(
            $this->uploadConfig->tSize->width, $this->uploadConfig->tSize->height
        );

        $cropped->save(storage_path($this->storePath . $this->uploadConfig->thumbnails . '/' . $uploaded->hashName()));

        return $uploaded;
    }

}
