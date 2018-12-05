<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\detailuser;
use Auth;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        setlocale(LC_ALL, 'id');
        Carbon::setLocale('id');

        view()->composer('layouts.app', function($view)
    {
      if(Auth::check()){
        $det = detailuser::where('iduser','=',Auth::User()->id)->first();
        $view->with('userdet', $det);
      }
    });
    Validator::extend(
          'recaptcha',
          'App\\Validators\\Recaptcha@validate'
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
