

@foreach($consultores as $consultor)
<div class="table-responsive">    
    <table class="table ls-table" id="tabela1">
        <thead>
            <tr>
                <th colspan="5">{{ $consultor['nome'] }}</th>
            </tr>
        </thead>
        <tbody>
            <tr id="tr-subtitle">
                <td>Período</td>
                <td>Receita Líquida</td>
                <td>Custo Fixo</td>
                <td>Comissäo</td>
                <td>Lucro</td>
            </tr>
            @foreach($consultor['periodos'] as $per)
            @if($consultor['usuario'] == $per['usuario'])
            <tr>
                <td>{{ $per['periodo'] }}</td>
                <td>{{ number_format($per['liquido'], 2) }} </td>
                <td>{{ number_format($per['salario'], 2) }}</td>
                <td>{{ number_format($per['comissao'], 2) }}</td>
                <td>
                    <div class = "{{ $per['lucro'] >= 0 ? '' : 'red-class' }}">
                    {{ number_format($per['lucro'], 2) }}</td>
                    </div>
            </tr>
            @endif
            @endforeach
            <tr id="tr-total">
                <td>TOTAL</td>
                <td>{{ number_format($consultor['liquidoPeriodo'], 2) }} </td>
                <td>{{ number_format($consultor['salarioPeriodo'], 2) }}</td>
                <td>{{ number_format($consultor['comissaoPeriodo'], 2) }}</td>
                <td>
                   <div class = "{{ $consultor['lucroPeriodo'] >= 0 ? 'blue-class' : 'red-class' }}">
                    {{ number_format($consultor['lucroPeriodo'], 2) }}
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div> 
@endforeach