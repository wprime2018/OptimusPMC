<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FunctionsController extends Controller
{
    //public static function validatePis(Request $request)
    public function validatePis(Request $request)
    {
        $ftap='3298765432';
        $i=0;
        $chars = array(".","/","-");
        $numPIS = str_replace($chars,"",$request->pis);
        $numPIS = (int)$numPIS;
        $strResto="";
        $total=0;
        $resto=0;
        $digito = (int)substr($numPIS,10,1);
        for($i=0;$i<=9;$i++)
        {
            $resultado = (substr($numPIS,$i,1))*(substr($ftap,$i,1));
            $total+=$resultado;
        }
        
        $resto = ($total % 11);
        
        if ($resto != 0)
            $resto=11-$resto;
        
        return ($resto!=$digito) ? 'false' : 'true';
    }

    public function mask($val, $mask) ## Para usar a máscara ($cnpj,'##.###.###/####-##')
    {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++)
        {
            if($mask[$i] == '#') {
                if(isset($val[$k]))
                $maskared .= $val[$k++];
            } else {
                if(isset($mask[$i]))
                $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }
}
