<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
        parent::__construct(['isAdmin' => true]);

        $this->middleware('auth');
    }

    /**
     * Show the content administration UI.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->addArg('account', Auth::user());

        return view('admin.user', $this->getArgs());
    }

}
