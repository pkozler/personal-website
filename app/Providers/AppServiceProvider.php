<?php

namespace App\Providers;

use App\Section;
use Collective\Html\FormFacade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Validator;
use App\Validators\ReCaptcha;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::share('siteInfo', Config::get("constants.app"));
        View::share('sectionList', Section::all());

        FormFacade::component('bsText', 'components.form.text', ['name', 'label' => null, 'value' => null, 'attributes' => []]);
        FormFacade::component('bsTextArea', 'components.form.text-area', ['name', 'label' => null, 'value' => null, 'attributes' => []]);
        FormFacade::component('bsSubmit', 'components.form.submit', ['value' => null, 'attributes' => []]);

        Validator::extend(
          'recaptcha',
          'App\\Validators\\ReCaptcha@validate'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
