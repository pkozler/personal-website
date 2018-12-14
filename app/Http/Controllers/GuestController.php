<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('log');

        $this->middleware('auth');
    }

    /**
     * Show the activity logging UI.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logData = Storage::disk('local')->get('log/access.txt');
        $this->addArg('logData', $logData);

        return view('admin.guests', $this->getArgs());
    }

}
