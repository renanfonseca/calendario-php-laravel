@extends('layouts.main')


@section('title', 'Calendario')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@endpush

@section('content')
    <div class="container-fluid ">
        <div class="row " style="height: 100vh;">
            <div class="col-4" style="background-color: #c3c3c3; height: 100vh; background-color: red;">
                <div class="" style=" height: 100vh">
                    <h1 style="font-size: 12.6rem; text-align: center; color:#fff;">
                        {{ $dataHoje }}
                    </h1>
                    <p style="font-size: 2.5rem; text-align: center; color:#fff;">Domingo</p>
                </div>
            </div>
            <div class="col-8">
                <div class="row" style="text-align: end;">
                    <span>{{ $ano }}</span>
                </div>
                <div class="row">
                    <div class="col" id="jan" style="text-align: center;">Jan</div>
                    <div class="col" style="text-align: center;">Fab</div>
                    <div class="col" style="text-align: center;">Mar</div>
                    <div class="col" style="text-align: center;">Apr</div>
                    <div class="col" style="text-align: center;">May</div>
                    <div class="col" style="text-align: center;">Jun</div>
                    <div class="col" style="text-align: center;">July</div>
                    <div class="col" style="text-align: center;">Aug</div>
                    <div class="col" style="text-align: center;">Sep</div>
                    <div class="col" style="text-align: center;">Oct</div>
                    <div class="col" style="text-align: center;">Nov</div>
                    <div class="col" style="text-align: center;">Dec</div>
                </div>
                <hr>
                <div class="row">
                    <div>
                        <table style=" width: 100%;">
                            <tr style=" background-color: #c3c3c3; text-align: center; ">
                                <th>DOM</th>
                                <th>SEG</th>
                                <th>TER</th>
                                <th>QUA</th>
                                <th>QUI</th>
                                <th>SEX</th>
                                <th>SÁB</th>
                            </tr>
                            @php
                                $diasCounter = 1;
                            @endphp

                            @while ($diasCounter <= $qtDiasNoMes)
                                <tr style="text-align: center;">

                                    @for ($i = 0; $i < $primeiroDiaDoMesIndex; $i++)
                                        <td></td>
                                    @endfor

                                    @for ($i = $primeiroDiaDoMesIndex; $i < 7; $i++)
                                        @if ($diasCounter <= $qtDiasNoMes)
                                            <td>
                                                <div @if ($dataHoje == $diasCounter and ($mes == date('M') or $mes == date('m'))) style="background-color: red; border-radius: 50px; color:#fff; font-weight: bold; cursor: pointer; width:45px; padding: 10px; margin:auto;" @endif
                                                    style="cursor: pointer; width:45px; padding: 10px;  border-radius: 50px; margin:auto; margin-top:5px; ">
                                                    {{ $diasCounter++ }}
                                                </div>
                                            </td>
                                        @else
                                            @php
                                                $diasCounter++;
                                            @endphp
                                        @endif
                                    @endfor
                                    @php
                                        $primeiroDiaDoMesIndex = 0;
                                    @endphp

                                </tr>
                            @endwhile
                        </table>



                        {{-- </br></br></br></br></br>
                        O mês é: {{ $mes }}</br>
                        O primeiro dia do mês é: {{ $primeiroDiaDoMesIndex }}</br>
                        Data Hoje: {{ $dataHoje }}</br>
                        Dia da Semana: {{ $diaDaSemana }}</br>
                        Dia da Semana Index: {{ $diaDaSemanaIndex }}</br>
                        Quantidades de dias no mês: {{ $qtDiasNoMes }} </br> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
