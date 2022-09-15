<?php
namespace Magdicom\TestInitial;

use Illuminate\Support\ServiceProvider;

class TestInitialServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        # Merge Config
        $this->mergeConfigFrom(
            __DIR__.'/../config/testinitial.php', 'testinitial'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        # Register API Routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        # Publish Config File
        $this->publishes([
            __DIR__.'/../config/testinitial.php' => config_path('testinitial.php'),
        ], 'test-initial-config');
    }
}