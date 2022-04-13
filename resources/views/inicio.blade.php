@extends('layouts.main')

@section('title', 'Comercial')

@section('content')

<div class="bg-white rounded shadow mb-5 select-container">
    <!-- Bordered tabs-->
    <ul id="myTab1" role="tablist" class="nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
        <li class="nav-item flex-sm-fill">
            <a id="consultor-tab" data-toggle="tab" href="#consultor" role="tab" aria-controls="consultor" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border active">Por Cosultor</a>
        </li>
        <li class="nav-item flex-sm-fill">
            <a id="cliente-tab" data-toggle="tab" href="#cliente" role="tab" aria-controls="cliente" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border">Por Cliente</a>
        </li>
    </ul>
    <div id="select-area">
        &nbsp;&nbsp;
        <select name="mes1" id="mes1">
        <option value="1">Jan</option>
            <option value="2">Fev</option>
            <option value="3">Mar</option>
            <option value="4">Abr</option>
            <option value="5">Mai</option>
            <option value="6">Jun</option>
            <option value="7">Jul</option>
            <option value="8">Ago</option>
            <option value="9">Set</option>
            <option value="10">Out</option>
            <option value="11">Nov</option>
            <option value="12">Dez</option>
        </select>
        <select name="ano1" id="ano1">
            @for($i=2007; $i<=2012; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        &nbsp;a&nbsp;
        <select name="mes2" id="mes2">
            <option value="1">Jan</option>
            <option selected value="2">Fev</option>
            <option value="3">Mar</option>
            <option value="4">Abr</option>
            <option value="5">Mai</option>
            <option value="6">Jun</option>
            <option value="7">Jul</option>
            <option value="8">Ago</option>
            <option value="9">Set</option>
            <option value="10">Out</option>
            <option value="11">Nov</option>
            <option value="12">Dez</option>
        </select>
        <select name="ano2" id="ano2">
            @for($i=2007; $i<=2012; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
    <div id="myTab1Content" class="tab-content">
        <div id="consultor" role="tabpanel" aria-labelledby="consultor-tab" class="tab-pane fade show active">
            <div class="row">

                <div id="select-container-consultant" class="col-lg-10">
                    <div class="dual-list-box-inner">
                        <form id="form_consultant" class="wizard-big">
                            @csrf
                            @method('POST')
                            <select class="form-control dual_select" id="consultant[]" name="consultant[]" multiple>
                                @foreach($consultores as $consultor)
                                <option value="{{ $consultor->co_usuario }}">{{ $consultor->no_usuario }} </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            
                <div id="btn-report-consultant" class="col-lg-2">
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link mb-3 p-3 shadow" onclick="consultorRelatorio();" id="report_consultant" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span class="font-weight-bold small text-uppercase">Relaório</span></a>

                        <a class="nav-link mb-3 p-3 shadow" onclick="consultorGrafico();" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <ion-icon name="bar-chart-outline"></ion-icon>
                        <span class="font-weight-bold small text-uppercase">Gráfico</span></a>

                        <a class="nav-link mb-3 p-3 shadow" onclick="consultorPizza();" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                        <ion-icon name="bowling-ball-outline"></ion-icon>
                        <span class="font-weight-bold small text-uppercase">Pizza</span></a>
                    </div>
                </div>
            </div>
            <div id="info-container-consultant" class="col-lg-12">
                          
            </div>
        </div>

        <div id="cliente" role="tabpanel" aria-labelledby="cliente-tab" class="tab-pane fade">
            <div class="row ">

                <div id="select-container-client" class="col-lg-10">
                    <div class="dual-list-box-inner">
                        <form id="form_client" name="form_client" class="wizard-big">
                        @csrf
                        @method('POST')
                            <select class="form-control dual_select" name="client[]" id="client" multiple>
                                @foreach($clientes as $cliente)
                                <option value="{{ $cliente->co_cliente }}">{{ $cliente->no_fantasia }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>

                <div id="btn-report-client" class="col-lg-2">
                    <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link mb-3 p-3 shadow active" onclick="clienteRelatorio();" id="consultant-report-tab" data-toggle="pill" href="#consultant-report" role="tab" aria-controls="consultant-report" aria-selected="true">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span class="font-weight-bold small text-uppercase">Relaório</span></a>

                        <a class="nav-link mb-3 p-3 shadow" onclick="clienteGrafico();" id="consultant-chart-tab" data-toggle="pill" href="#consultant-chart" role="tab" aria-controls="consultant-chart" aria-selected="false">
                        <ion-icon name="bar-chart-outline"></ion-icon>
                        <span class="font-weight-bold small text-uppercase">Gráfico</span></a>

                        <a class="nav-link mb-3 p-3 shadow" onclick="clientePizza();" id="consultant-pizza-tab" data-toggle="pill" href="#consultant-pizza" role="tab" aria-controls="consultant-pizza" aria-selected="false">
                        <ion-icon name="bowling-ball-outline"></ion-icon>
                        <span class="font-weight-bold small text-uppercase">Pizza</span></a>
                    </div>
                </div>
            </div>
            <div id="info-container-client" class="col-lg-12">
                         
            </div>
        
        </div>
    <!-- End bordered tabs -->
    </div>
    
</div>
@endsection

