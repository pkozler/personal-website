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

    public function __construct($initArgs = [])
    {
        foreach ($initArgs as $k => $v) {
            $this->addArg($k, $v);
        }
    }

    protected function addArg(string $key, $val = null) {
        $this->data = array_add($this->data, $key, $val);
        return $this;
    }

    protected function getArgs() {
        return $this->data;
    }

    protected function getUploadConfig($input = false) {
        $config = Config::get("constants.upload");

        $parsedConfig = [
            'fullsize' => "storage/{$config['img_dest']}",
            'thumbnails' => "storage/{$config['timg_dest']}",
        ];

        if (!$input) {
            return (object) $parsedConfig;
        }
        $parsedConfig['tSize'] = (object) [
            'width' => $config['t_width'],
            'height' => $config['t_height'],
        ];

        return (object) $parsedConfig;
    }

}
