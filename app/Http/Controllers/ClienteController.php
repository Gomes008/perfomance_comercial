<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Consultor;
use App\Models\Cliente;
use App\Models\Os;
use App\Models\Fatura;
use App\Models\Salario;

use DateTime;
use DatePeriod;
use DateInterval;

class ClienteController extends Controller
{
    
    public function clienteRelatorio(Request $request){
        
        $clientes = $request->cliente;
        $dataInicio = $request->dataInicio;
        $dataFinal = $request->dataFinal;
        $status = $request->status;

        $inicio    = (new DateTime($dataInicio))->modify('first day of this month');
        $final      = (new DateTime($dataFinal))->modify('first day of next month');
        $intervalo = DateInterval::createFromDateString('1 month');
        $periodos   = new DatePeriod($inicio, $intervalo, $final);
        
       if($clientes ){
        $total = 0;
            foreach($clientes as $cliente_s){
                $cliente = Cliente::where('co_cliente', $cliente_s)->first()->toArray();
                
                $mex[] = '';
                $totalp = 0;
                foreach($periodos as $periodo){
                    $fatura = Fatura::where('co_cliente', $cliente_s)
                    ->whereYear('data_emissao', '=', $periodo->format("Y"))
                    ->whereMonth('data_emissao', '=', $periodo->format("m"))
                    ->get();

                    $liquido=0;
                    foreach($fatura as $fat){
                    
                        $total_imp = $fat['valor'] * $fat['total_imp_inc'] / 100 ;
                        
                        $liq = $fat['valor'] - $total_imp;
                        $liquido += $liq;
                        
                    }
                    $liquido=$liquido;
                    $total += $liquido; // Total Geral
                    $totalp += $liquido; //Total periodos
                    $peri = $periodo;
                    $mex[] = $liquido; //guardar valores liquidos
                    $maximo = max($mex); //Valor maximo po cada cliente
                    $periodo = (new DateTime($periodo->format("Y-m")))->format('F Y');
                   

                    $periods[] = array(
                        'clienteid' => $cliente['co_cliente'],
                        'periodo' =>  $periodo,
                        'peri' =>  $peri,
                        'liquido' => $liquido  
                    );
                }

                $client[] = array(
                    'clienteid' => $cliente['co_cliente'],
                    'cliente' => $cliente['no_fantasia'],
                    'liquido' => $liquido,
                    'periodos' => $periods,
                    'totalp' => $totalp,
                    'maximo' => $maximo
                    );
            } 
            $clientes = $client;
            if($status == 1){
                return view('clientes/relatorio', ['clientes' => $clientes, 'tempo' => $periodos]);
            }else if($status == 2){
                return view('clientes/grafico', ['clientes' => $clientes, 'tempo' => $periodos]);
            }else if($status == 3){
                return view('clientes/pizza', ['clientes' => $clientes, 'total' => $total]);
            }
        }
    }
    
}
