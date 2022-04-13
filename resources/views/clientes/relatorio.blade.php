

<div class="table-responsive">    
    <table class="table ls-table" id="tabela1">
         <thead>
             
         </thead>
         <tbody>
             <tr id="tr-subtitle">
                 <td>Período</td>
                 @foreach($clientes as $cliente)
                 <td>{{ $cliente['cliente'] }}</td>
                @endforeach
                
             </tr>
             @foreach($tempo as $temp)
             <tr>
                <td>{{ (new DateTime($temp->format("Y-m")))->format('F Y') }}</td>

                @foreach($clientes as $cliente)
                @foreach($cliente['periodos'] as $per)
                @if($cliente['clienteid'] == $per['clienteid'] && $per['peri']->format("Y-m") == $temp->format("Y-m"))
                 <td> 
                 <div class = "{{ $cliente['maximo'] == $per['liquido'] ? 'blue-class' : '' }}"> 
                     {{ number_format($per['liquido'], 2) }} </td>  
                </div>
                 @endif
                 @endforeach
                @endforeach
                
             </tr>
             @endforeach
             
             <tr id="tr-total">
                <td>Total</td>
                
                @foreach($clientes as $cliente)
                 <td>{{ number_format($cliente['totalp'], 2) }} </td>  
                @endforeach
             </tr>
             
         </tbody>
    </table>
</div> 

