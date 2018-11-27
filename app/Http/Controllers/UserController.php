<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('log');
    }

    /**
     * Show the content management UI.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function log()
    {
        $data = Storage::disk('local')->get('log/access.txt');

        return view('admin.guests')->with('logData', $data);
    }

}
