<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.guests');
    }

}
