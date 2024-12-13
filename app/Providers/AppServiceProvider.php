<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Models\SystemSetting;

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

        view()->composer('*', function ($view)
        {
            $setting = SystemSetting::pluck('value', 'key');
            $view->with('setting', $setting);
        });

        //
            Blade::directive('money', function ($amount) {
                return "<?php echo '' . number_format($amount, 2); ?>";
            });
            
    }

    

}
