<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrapFive();

        Blade::directive('convert', function ($amount) {
            return "Rp <?php echo number_format($amount,0,',','.'); ?>";
        });

        Blade::directive('Lpad', function ($amount) {
            return "<?php echo str_pad($amount, 10, '0', STR_PAD_LEFT); ?>";
        });
    }
}
