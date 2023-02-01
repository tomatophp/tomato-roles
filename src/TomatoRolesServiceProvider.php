<?php

namespace TomatoPHP\TomatoRoles;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoPHP\Services\Menu\TomatoMenuRegister;
use TomatoPHP\TomatoRoles\Console\TomatoRolesGenerate;
use TomatoPHP\TomatoRoles\Console\TomatoComponentsInstall;
use TomatoPHP\TomatoRoles\Console\TomatoRolesInstall;
use TomatoPHP\TomatoRoles\Menus\ALCMenu;
use TomatoPHP\TomatoRoles\Menus\BackupMenu;

class TomatoRolesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-roles.php', 'tomato-roles');

        //Register Menus for Tomato Roles
        TomatoMenuRegister::registerMenu(ALCMenu::class);

        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-roles');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-roles');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        //Publish Views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-roles'),
        ], 'views');

        //Publish Config
        $this->publishes([
            __DIR__.'/../config/tomato-roles.php' => config_path('tomato-roles.php'),
        ], 'config');

        //Publish Lang
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/tomato-roles'),
        ], 'lang');

        //Publish Migrations
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'migrations');

        //Register generate command
        $this->commands([
            TomatoRolesGenerate::class,
            TomatoRolesInstall::class
        ]);

        //Register View Component
        $this->loadViewComponentsAs('tomato', [
            \TomatoPHP\TomatoRoles\Views\Logout::class,
        ]);
    }

    public function boot(): void
    {
        //Add Middleware Global to Routes web
        $this->app['router']->aliasMiddleware('tomato-roles', \TomatoPHP\TomatoRoles\Http\Middleware\Can::class);
        $this->app['router']->pushMiddlewareToGroup('web', \TomatoPHP\TomatoRoles\Http\Middleware\Can::class);
    }
}
