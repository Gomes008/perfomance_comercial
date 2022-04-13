
 function consultorRelatorio(){
        
	var mes1 = $('[name="mes1"').val();
	var mes2 = $('[name="mes2"').val();
	var ano1 = $('[name="ano1"').val();
	var ano2 = $('[name="ano2"').val();

	var id = $('[name="consultant[]"').val();
	var status = 1;
	var dataInicio = ano1 +'-'+ mes1;
	var dataFinal = ano2 +'-'+ mes2;
	
	$.ajaxSetup({
		headers:
		{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	});
	$.ajax({
		url : "/consultores/relatorio",
		type:"POST",
		data:{consultor:id, dataInicio:dataInicio, dataFinal:dataFinal, status:status,
			_token: "{{ csrf_token() }}",
			_method: "GET",
		},
		success:function(data)
		{
			$('#info-container-consultant').html(data); 
		}
	});
}

function consultorGrafico(){

	var mes1 = $('[name="mes1"').val();
	var mes2 = $('[name="mes2"').val();
	var ano1 = $('[name="ano1"').val();
	var ano2 = $('[name="ano2"').val();

	var id = $('[name="consultant[]"').val();
	var status = 2;
	var dataInicio = ano1 +'-'+ mes1;
	var dataFinal = ano2 +'-'+ mes2;

	$.ajaxSetup({
		headers:
		{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	});
	$.ajax({
		url : "/consultores/grafico",
		type:"POST",
		data:{consultor:id, dataInicio:dataInicio, dataFinal:dataFinal, status:status,
			_token: "{{ csrf_token() }}",
			_method: "GET",
		},
		success:function(data)
		{
			$('#info-container-consultant').html(data); 
		}
	});
}

function consultorPizza(){

	var mes1 = $('[name="mes1"').val();
	var mes2 = $('[name="mes2"').val();
	var ano1 = $('[name="ano1"').val();
	var ano2 = $('[name="ano2"').val();

	var id = $('[name="consultant[]"').val();
	var status = 3;
	var dataInicio = ano1 +'-'+ mes1;
	var dataFinal = ano2 +'-'+ mes2;

	$.ajaxSetup({
		headers:
		{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	});
	$.ajax({
		url : "/consultores/pizza",
		type:"POST",
		data:{consultor:id, dataInicio:dataInicio, dataFinal:dataFinal, status:status,
			_token: "{{ csrf_token() }}",
			_method: "GET",
		},
		success:function(data)
		{
			$('#info-container-consultant').html(data); 
		}
	});
}


function clienteRelatorio() {

	var mes1 = $('[name="mes1"').val();
	var mes2 = $('[name="mes2"').val();
	var ano1 = $('[name="ano1"').val();
	var ano2 = $('[name="ano2"').val();

	var id = $('[name="client[]"').val();
	var status = 1
	var dataInicio = ano1 +'-'+ mes1;
	var dataFinal = ano2 +'-'+ mes2;

	$.ajaxSetup({
		headers:
		{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	});
	$.ajax({
		url : "/clientes/relatorio",
		type:"POST",
		data:{cliente:id, dataInicio:dataInicio, dataFinal:dataFinal, status:status,
			_token: "{{ csrf_token() }}",
			_method: "GET",
		},
		success:function(data)
		{
			$('#info-container-client').html(data); 
		}
	});
}

function clienteGrafico() {

	var mes1 = $('[name="mes1"').val();
	var mes2 = $('[name="mes2"').val();
	var ano1 = $('[name="ano1"').val();
	var ano2 = $('[name="ano2"').val();

	var id = $('[name="client[]"').val();
	var status = 2
	var dataInicio = ano1 +'-'+ mes1;
	var dataFinal = ano2 +'-'+ mes2;


	$.ajaxSetup({
		headers:
		{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	});
	$.ajax({
		url : "/clientes/grafico",
		type:"POST",
		data:{cliente:id, dataInicio:dataInicio, dataFinal:dataFinal, status:status,
			_token: "{{ csrf_token() }}",
			_method: "GET",
		},
		success:function(data)
		{
			$('#info-container-client').html(data); 
		}
	});
}

function clientePizza() {

	var mes1 = $('[name="mes1"').val();
	var mes2 = $('[name="mes2"').val();
	var ano1 = $('[name="ano1"').val();
	var ano2 = $('[name="ano2"').val();

	var id = $('[name="client[]"').val();
	var status = 3
	var dataInicio = ano1 +'-'+ mes1;
	var dataFinal = ano2 +'-'+ mes2;

	$.ajaxSetup({
		headers:
		{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	});
	
	$.ajax({
		url : "/clientes/pizza",
		type:"POST",
		data:{cliente:id, dataInicio:dataInicio, dataFinal:dataFinal, status:status,
			_token: "{{ csrf_token() }}",
			_method: "GET",
		},
		success:function(data)
		{
			$('#info-container-client').html(data); 
		}
	});
}

 