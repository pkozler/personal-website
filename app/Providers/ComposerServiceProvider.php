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

        View::composer(
            AdminController::createViewName(AdminController::LIST_SUFFIX, ImageController::PAGE), function ($view) {
            $view->with('uploadConfig', $this->getUploadConfig(true));
        });
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

    private function getDesignConfig() {
        $config = Config::get('constants.design');

        $colMaxSize = max(1, $config['col_max_size']);
        $noteCols = max(1, $config['note_cols']);
        $linkCols = max(1, $config['link_cols']);

        $parsedConfig = [
            'bgImage' => $config['bg_img'],
            'noteCols' => $noteCols,
            'linkCols' => $linkCols,
            'noteColSize' => self::calculateColumn($colMaxSize, $noteCols),
            'noteColAltSize' => self::calculateColumnAlt($colMaxSize, $noteCols),
            'linkColSize' => self::calculateColumn($colMaxSize, $linkCols),
        ];

        return (object) $parsedConfig;
    }

    private static function calculateColumn(int $maxSize, int $colCount) {
        return max(1, intval($maxSize / $colCount));
    }

    private static function calculateColumnAlt(int $maxSize, int $colCount) {
        return max(1, $colCount > 1 ? intval($maxSize / 2) : $maxSize);
    }

}
