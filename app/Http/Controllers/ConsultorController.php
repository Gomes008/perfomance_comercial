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

class ConsultorController extends Controller
{
    
    
    public function index() {
        return view('home');
    }
    
    public function inicio() {
        
        $consultores = Consultor::leftJoin('permissao_sistema as p', 'cao_usuario.co_usuario', '=', 'p.co_usuario')
        ->where('p.in_ativo', 'S')
        ->where('p.co_sistema', 1)
        ->whereIn('p.co_tipo_usuario', [0 , 1, 2])
        ->select('cao_usuario.co_usuario as co_usuario','cao_usuario.no_usuario as no_usuario')
        ->get();

        $clientes = Cliente::where([
            ['tp_cliente', 'A']
        ])->get();

        return view('inicio', ['consultores' => $consultores, 'clientes' => $clientes]);
    }


    public function consultorRelatorio(Request $request) {
        
        $consultores = $request->consultor;
        $dataInicio = $request->dataInicio;
        $dataFinal = $request->dataFinal;
        $status = $request->status;

        $inicio    = (new DateTime($dataInicio))->modify('first day of this month');
        $final      = (new DateTime($dataFinal))->modify('first day of next month');
        $intervalo = DateInterval::createFromDateString('1 month');
        $periodos   = new DatePeriod($inicio, $intervalo, $final);
        
       if($consultores){
            $total = 0;
            foreach($consultores as $consultor_s){
                $con = Consultor::where('co_usuario', $consultor_s)->first()->toArray();
                $salario = Salario::where('co_usuario', $consultor_s)->first();

                
                $liquidoPeriodo=0;
                $comissaoPeriodo = 0;
                $lucroPeriodo = 0;
                $salarioPeriodo = 0;
                foreach($periodos as $periodo){
                    $faturas = Fatura::Join('cao_os as os', 'os.co_os', '=', 'cao_fatura.co_os')
                    ->where('os.co_usuario', $consultor_s)
                    ->whereYear('cao_fatura.data_emissao', '=', $periodo->format("Y"))
                    ->whereMonth('cao_fatura.data_emissao', '=', $periodo->format("m"))
                    ->get('cao_fatura.*');

                    $liquido=0;
                    $comissao = 0;
                    $lucro = 0;
                    foreach($faturas as $fatura){
                        
                        //convertendo o percentual do total_imp e comissao em valores absolutos
                        $total_imp = ($fatura['valor'] * $fatura['total_imp_inc']) / 100 ;
                        $comissao_cn = ($fatura['valor'] * $fatura['comissao_cn']) / 100 ;

                        //calculo do valor liquido, comissao e lucro
                        $liq = $fatura['valor'] - $total_imp;
                        $com = $liq - ($liq * ($fatura['total_imp_inc'] / 100) * ($fatura['comissao_cn'] / 100));
                        $luc = $liq - ($salario['brut_salario'] + $comissao_cn);

                        //fazer a soma dos valores das faturas de acordo com consultor e dentro de um período
                        $liquido += $liq;
                        $comissao += $com;
                        $lucro += $luc;
                    }
                    
                    $total += $liquido; //Valor liquido Total geral
                    //valores totais em relação a fatura em um periodo
                    $liquido=$liquido;
                    $comissao = $comissao;
                    $lucro = $lucro;

                    $periodo = (new DateTime($periodo->format("Y-m")))->format('F Y');

                    //valores totais em relação aos períodos
                    $liquidoPeriodo += $liquido;
                    $comissaoPeriodo += $comissao;
                    $lucroPeriodo += $lucro;
                    $salarioPeriodo += $salario['brut_salario'];
                    

                    $periods[] = array(
                        'usuario' => $con['co_usuario'],
                        'periodo' =>  $periodo,
                        'liquido' => $liquido,
                        'salario' => $salario['brut_salario'],
                        'comissao' => $comissao,
                        'lucro' => $lucro,
                    );
                }

                $consulto[] = array(
                    'usuario' => $con['co_usuario'],
                    'nome' => $con['no_usuario'],
                    'periodos' => $periods,
                    'liquido' => $liquido,
                    'liquidoPeriodo' => $liquidoPeriodo,
                    'comissaoPeriodo' => $comissaoPeriodo,
                    'lucroPeriodo' => $lucroPeriodo,
                    'salarioPeriodo' => $salarioPeriodo,
                );
            } 
            $consultores = $consulto;
            if($status == 1) {
                return view('consultores/relatorio', ['consultores' => $consultores]);
            }else if($status == 2) {
                return view('consultores/grafico', ['consultores' => $consultores, 'tempo'=>$periodos]);
            }else if($status == 3){
                return view('consultores/pizza', ['consultores' => $consultores, 'total' => $total]);
            }
        }  
    }
}
