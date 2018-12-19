<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
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
        parent::__construct(['isAdmin' => false]);

        $this->middleware('auth');
    }

    /**
     * Show the activity logging UI.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logPath = Config::get('constants.access');
        $logData = Storage::disk('local')->get($logPath['log_file']);
        $this->addArg('logData', $logData);

        return view('admin.guest', $this->getArgs());
    }

}
