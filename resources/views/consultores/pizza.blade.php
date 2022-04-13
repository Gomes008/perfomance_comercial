

<div id="pizzaConsultor" style="min-width: 310px;  margin: 0 auto"></div>

<script type="text/javascript">

  Highcharts.chart('pizzaConsultor', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Porcentagem do valor líquido referente aos consultores e período selecionado'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: true,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %'
              }
          }
      },
      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [
            @foreach($consultores as $consultor)
            @if($consultor['liquido'] != 0)
            {
              name:  "{{ $consultor['nome'] }}",
              y: {{ $consultor['liquido'] }} / {{ $total }}
          }, 
          @endif 
          @endforeach 
          ]
      }]
  });
</script>