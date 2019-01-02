<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class UserController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(null);
    }

    /**
     * Show the content administration UI.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $account = Auth::user();

        return $this->getView('settings', compact('account'));
    }

}
