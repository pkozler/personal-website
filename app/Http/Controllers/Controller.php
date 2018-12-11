<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Config;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $data = [];

    public function __construct($pageTypeName)
    {
        // TODO ošetřit neplatný formát proměnné $pageType
        $pageTypeValues = Config::get("constants.layouts.$pageTypeName");
        $pageType = array_add($pageTypeValues, 'name', $pageTypeName);
        $this->addArg('pageType', $pageType);
    }

    protected function addArg(string $key, $val = null) {
        //if (array_has($this->data, $key)) {
            // TODO ošetřit vkládání na existující klíče
        //}

        $this->data = array_add($this->data, $key, $val);
        return $this;
    }

    protected function getArgs() {
        return $this->data;
    }
}
