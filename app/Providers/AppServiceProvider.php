<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use app\user;
use App\Models\Fundos;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        View::share('key', 'value');
        Schema::defaultStringLength(191);

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            // $event->menu->add('MAIN NAVIGATION');
            $event->menu->add([
                'text'    => 'Fundos',
                'icon'    => 'building',
                'submenu' => [
                    [
                        'text'        => 'Cadastro',
                        'url'         => 'fundos/',
                        'label'       => Fundos::count(),
                        'label_color' => 'success',
                        'icon_color' => 'aqua',
                    ],
                    [
                        'text'        => 'Responsável',
                        'url'         => 'respFundos/',
                        'label'       => Fundos::count(),
                        'label_color' => 'success',
                        'icon_color' => 'aqua',
                    ],
                    [
                        'text'        => 'Secretarias',
                        'url'         => 'secretaria/',
                        'label'       => Fundos::count(),
                        'label_color' => 'success',
                        'icon_color' => 'aqua',
                    ],
                    [
                        'text'        => 'Cargos',
                        'url'         => 'cargos/',
                        'label'       => Fundos::count(),
                        'label_color' => 'success',
                        'icon_color' => 'aqua',
                    ],
                    [
                        'text'        => 'Dotação Orçam.',
                        'url'         => 'dotorc/',
                        'label'       => Fundos::count(),
                        'label_color' => 'success',
                        'icon_color' => 'aqua',
                    ],
                    [
                        'text'        => 'Fonte de Recursos',
                        'url'         => 'fonte/',
                        'label'       => Fundos::count(),
                        'label_color' => 'success',
                        'icon_color' => 'aqua',
                    ],

                ]
            ]);
            $event->menu->add([
                'text'    => 'Colaboradores',
                'icon'    => 'user',
                'submenu' => [
                    [
                        'text'        => 'Cadastro',
                        'url'         => 'colab/',
                        'label'       => Fundos::count(),
                        'label_color' => 'success',
                        'icon_color' => 'aqua',
                    ],
                    [
                        'text'        => 'Vencimentos',
                        'url'         => 'respFundos/   ',
                        'label'       => Fundos::count(),
                        'label_color' => 'success',
                        'icon_color' => 'aqua',
                    ],
                ]
            ]);
        });
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
