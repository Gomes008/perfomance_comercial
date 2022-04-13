

 <div class="row">
    <div class="col-md-12">
        <div id="graficoConsultor" style="min-width: 310px; margin: 0 auto"></div>
    </div>
</div>

<script type="text/javascript">
  Highcharts.chart('graficoConsultor', {

      chart: {
        
      type: 'column'
      },
      title: {
          text: 'Perfomance Comercial'
      },
      xAxis: {
          categories: [
            @foreach($tempo as $temp)
            "{{ (new DateTime($temp->format("Y-m")))->format('F Y') }}",
            @endforeach
              
          ],
          crosshair: true
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Valor Líquido (R$)'
          }
      },
      tooltip: {
          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
              '<td style="padding:0"><b>{point.y:.1f} R$</b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          }
      },
      series: [
        @foreach($consultores as $consultor) 
        {
          name: "{{ $consultor['usuario'] }}",
          data: [
          @foreach($consultor['periodos'] as $per)
          @if($consultor['usuario'] == $per['usuario'])
            {{ $per['liquido'] }},
          @endif
          @endforeach
          ]
      }, 
      @endforeach
      ]
  });
</script>