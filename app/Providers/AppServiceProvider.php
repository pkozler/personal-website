<?php

namespace App\Providers;

use Collective\Html\FormFacade;
use Illuminate\Support\Facades\Schema;
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
        FormFacade::component('bsText', 'components.form.text', ['name', 'label' => null, 'value' => null, 'attributes' => []]);
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
