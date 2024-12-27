@extends('medico.layout.master')

@section('title','Agendamento')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Dados do pessoal do agendador</h1>

            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('view.medico.dashboard') }}" >Painel de Controle</a></div>
              <div class="breadcrumb-item">Agendamento</div>
            </div>
          </div>
      <div class="section-body">
        <div class="row mt-sm-4">

            <!-- Index nEW agendamento -->
            <div class="col-12">

            <div class="card">

                <div class="card-header" >
                    <h4>Dados pessoais</h4>
                    <div class="card-header-action">
                        <a class="btn btn-primary" href="{{ route('listar.agenda') }}">Cadastrar novo</a>
                    </div>
                </div>

                <div class="card-body bg-dark">
                    <div class="row">
                <div class="col-md-8">
                <div class="card">

                        <div class="card-header">
                            <h4>{{ $agendamento->nome }}</h4>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Data de nascimento: {{ \Carbon\Carbon::parse($agendamento->data_nascimento)->format('d/m/y') }}</li>
                          <li class="list-group-item">nº de Identidade: {{ $agendamento->n_bi }}</li>
                          <li class="list-group-item">Telefone: {{ $agendamento->telefone }}</li>
                          <li class="list-group-item">Estado Civil: {{ $agendamento->estado }}</li>
                          <li class="list-group-item">Provincia: {{ $agendamento->provincia }}</li>
                          <li class="list-group-item">Municipio: {{ $agendamento->municipio }}</li>
                          <li class="list-group-item">Medico Marcado: {{ $agendamento->medico->nome }}</li>
                          <li class="list-group-item">Especialidade: {{ $agendamento->medico->medico->especialidade }}</li>
                          <li class="list-group-item">Data da Consulta: {{ \Carbon\Carbon::parse( $agendamento->escala->data)->format('d/m/y') }}</li>
                        </ul>

                        <div class="d-flex justify-content-end mt-5 mb-3 mr-3">
                            <a class="btn btn-primary btn-lg mr-3" href="{{ route('view.medico.edit',$agendamento->id) }}">Editar agendamento</a>
                            <a class="btn btn-success btn-lg " href="{{ route('view.medico.consulta',$agendamento->id) }}">Confirmar consulta</a>
                        </div>
                </div>
                </div>
            </div>

                </div>

            </div>


        </div>
      </div>
    </section>


</div>
@endsection
