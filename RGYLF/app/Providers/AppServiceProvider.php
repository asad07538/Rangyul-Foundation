<?php

namespace App\Providers;
use App\Models\AccFinalYear;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        try {
            //code...
            $fyear = AccFinalYear::where('active',1)->first();
            // dd($fyear);
            if($fyear == null){

                return redirect('account_financialyear\index');
            }
            View::share('fyear',$fyear);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
