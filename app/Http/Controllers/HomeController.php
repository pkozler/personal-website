<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Image;
use App\Link;
use App\Note;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('home');

        // $this->middleware('auth');
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->logAccess($request);

        $noteList = Note::all();
        $imageList = Image::all();
        $githubLink = Link::search('github')->get()->get(0);
        $contactList = Link::where('attr_id', '!=', $githubLink->attr_id)->get();

        $this->addArg('noteList', $noteList)
            ->addArg('imageList', $imageList)
            ->addArg('githubLink', $githubLink)
            ->addArg('contactList', $contactList);

        return view('home', $this->getArgs());
    }

    private function logAccess($request) {
        $log = Carbon::now()->toDateTimeString() . ' ' . $request->ip();
        Storage::disk('local')->append('log/access.txt', $log);
    }

}
