<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fundos;

class DashboardsController extends Controller
{
    public function master()
    {
        $dashmaster = [
            'PMC' => [
                'Folha' => '83.997,00',
                ''
            ],
        ];
     
     
        $title = 'OptimusRH';
        $fundosAtivos = Fundos::where('ativo','1')->get();
        return view('dashboard.dashmaster', compact('fundosAtivos', 'title'));
    }
}
