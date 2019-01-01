<?php

namespace App\Providers;

use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using Closure based composers...
        View::composer('home', function ($view) {
            $view->with('uploadConfig', $this->getUploadConfig())
                ->with('design', $this->getDesignConfig());
        });

        View::composer(AdminController::createViewName(
            AdminController::LIST_SUFFIX, ImageController::PAGE), function ($view) {
            $view->with('image', $this->getUploadConfig(true));
        });
    }

    private function getDesignConfig() {
        $config = Config::get('constants.design');

        $parsedConfig = [
            'bgImage' => $config['bg_img'],
            'noteCols' => $config['note_cols'],
            'linkCols' => $config['link_cols'],
        ];

        return (object) $parsedConfig;
    }

    private function getUploadConfig($input = false) {
        $config = Config::get("constants.upload");

        $parsedConfig = [
            'fullsize' => "{$config['img_dest']}",
            'thumbnails' => "{$config['timg_dest']}",
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
