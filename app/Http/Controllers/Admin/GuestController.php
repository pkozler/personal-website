<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class GuestController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(null, false);
    }

    /**
     * Show the activity logging UI.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $logPath = Config::get('constants.access');
        $logData = Storage::disk('local')->get($logPath['log_file']);

        return $this->getView('logs', compact('logData'));
    }

}
