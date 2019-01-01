<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Image;
use App\Link;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->logAccess($request);

        return view('home', $this->loadContent());
    }

    private function loadContent() {
        $githubLink = Link::search('github')->get()->get(0);
        $noteList = Note::all();
        $imageList = Image::all();
        $contactList = Link::where('attr_id', '!=', $githubLink->attr_id)->get();

        return compact('noteList', 'imageList', 'contactList', 'githubLink');
    }

    private function logAccess($request) {
        $log = Carbon::now()->toDateTimeString() . ' ' . $request->ip();
        Storage::disk('local')->append('log/access.txt', $log);
    }

    public function refs()
    {
        return Link::all();
    }

}
