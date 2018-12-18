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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->logAccess($request);
        $viewArgs = $this->loadContent();

        foreach ($viewArgs as $argName => $argData) {
            $this->addArg($argName, $argData);
        }

        return view('home', $this->getArgs());
    }

    private function loadContent() {
        $githubLink = Link::search('github')->get()->get(0);

        $viewArgs = [
            'noteList' => Note::all(),
            'imageList' => Image::all(),
            'contactList' => Link::where('attr_id', '!=', $githubLink->attr_id)->get(),
            'githubLink' => $githubLink,
            'uploadConfig' => $this->getUploadConfig(false),
            'nCols' => 4,
        ];

        return $viewArgs;
    }

    private function logAccess($request) {
        $log = Carbon::now()->toDateTimeString() . ' ' . $request->ip();
        Storage::disk('local')->append('log/access.txt', $log);
    }

}
