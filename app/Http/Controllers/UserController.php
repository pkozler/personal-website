<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('log');

        $this->middleware('auth')->only('log');
    }

    /**
     * Show the forms management UI.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function log()
    {
        $logData = Storage::disk('local')->get('log/access.txt');
        $this->addArg('logData', $logData);

        return view('admin.guests', $this->getArgs());
    }

}
