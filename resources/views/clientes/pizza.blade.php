
<div id="pizzaCliente" style="min-width: 310px;  margin: 0 auto"></div>

<script type="text/javascript">
  Highcharts.chart('pizzaCliente', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Porcentagem do valor líquido referente aos clientes e período selecionado'
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
            @foreach($clientes as $cliente)
            @if($cliente['liquido'] != 0)
            {
              name:  "{{ $cliente['cliente'] }}",
              y: {{ $cliente['liquido'] }} / {{ $total }}
          }, 
          @endif 
          @endforeach 
          ]
      }]
  });
</script>