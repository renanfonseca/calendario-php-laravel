<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index(Request $request)
    {

        $ano = $request['ano'];
        $mes = $request['mes'];
        $qtDiasNoMes = $request['qtDiasNoMes'];
        $diaDaSemana = $request['diaDaSemana'];
        $dataHoje = $request['dataHoje'];

        if (empty($request['ano'])) {
            $ano = date('o');
        }

        $primeiroDiaDoMesIndex =  jddayofweek(
            cal_to_jd(
                CAL_GREGORIAN,
                date(empty($request['mes']) ? 'm' : $mes),
                date(1),
                date(empty($request['ano']) ? 'y' : $ano)
            ),
            0
        );


        if (empty($request['mes'])) {
            $mes = jdmonthname(cal_to_jd(
                CAL_GREGORIAN,
                date('m'),
                date('d'),
                date('y')
            ), CAL_MONTH_GREGORIAN_SHORT);
        }


        if (empty($request['qtDiasNoMes'])) {
            $qtDiasNoMes = cal_days_in_month(
                CAL_GREGORIAN,
                date(empty($request['mes']) ? 'm' : $mes),
                date(empty($request['ano']) ? 'y' : $ano)
            );
        }


        if (empty($request['diaDaSemana'])) {
            $diaDaSemana = jddayofweek(
                cal_to_jd(
                    CAL_GREGORIAN,
                    date('m'),
                    date('d'),
                    date('y')
                ),
                1
            );
            $diaDaSemanaIndex = jddayofweek(
                cal_to_jd(
                    CAL_GREGORIAN,
                    date('m'),
                    date('d'),
                    date('y')
                ),
                0
            );
        }


        if (empty($request['dataHoje'])) {
            $dataHoje = date('d');
        }


        return view('/calendario', [
            'qtDiasNoMes' => $qtDiasNoMes,
            'diaDaSemana' => $diaDaSemana,
            'mes' => $mes,
            'dataHoje' => $dataHoje,
            'diaDaSemanaIndex' => $diaDaSemanaIndex,
            'ano' => $ano,
            'primeiroDiaDoMesIndex' => $primeiroDiaDoMesIndex
        ]);
    }
}
