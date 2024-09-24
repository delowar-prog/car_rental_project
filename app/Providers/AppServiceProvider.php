<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('row', function () {
            return "<div class='row row-form row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 row-cols-xl-4 row-cols-xxl-5'>";
        });
        Blade::directive('srow', function () {
            return "<div class='row row-form row-cols-1 row-cols-md-2 row-cols-lg-3 gx-2 gy-1 row-cols-xl-4 row-cols-xxl-5'>";
        });
        Blade::directive('endrow', function () {
            return "</div>";
        });
        Blade::directive('err', function ($field, $message = false) {
            return "<?php echo \$errors->has($field) ? 'is-invalid' : ''; ?>";
        });

        Blade::directive('bengaliNumber', function ($expression) {
            return "<?php echo strtr($expression, ['0' => '০', '1' => '১', '2' => '২', '3' => '৩', '4' => '৪', '5' => '৫', '6' => '৬', '7' => '৭', '8' => '৮', '9' => '৯']); ?>";
        });

        Schema::defaultStringLength(191);

        Paginator::useBootstrap();
    }
}
