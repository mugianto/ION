<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Artikel;

class VarBuatSemuaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('pondasi.depan.side', function ($view) {
            $popular_artikel = Artikel::terbit()
                ->popularArtikel()
                ->take(4)
                ->get();
            $view->with('popular_artikel', $popular_artikel);
        });
    }
}
