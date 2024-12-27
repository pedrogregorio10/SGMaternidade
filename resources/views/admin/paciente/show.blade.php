@extends('admin.layout.master')

@section('title','Silder Destaque')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Dados do paciente</h1>

            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}" >Painel de Controle</a></div>
              <div class="breadcrumb-item">paciente</div>
            </div>
          </div>
      <div class="section-body">
        <div class="row mt-sm-4">

            <!-- Index nEW SLIDER -->
            <div class="col-12">

            <div class="card">

                <div class="card-header" >
                    <h4>Visualizar paciente</h4>
                    <div class="card-header-action">
                        <a class="btn btn-primary" href="{{ route('paciente.create') }}">Cadastrar novo</a>
                    </div>
                </div>

                <div class="card-body bg-dark">
                    <div class="row">
                <div class="col-md-8">
                <div class="card">

                        <div class="card-header">
                            <h4>{{ $paciente->nome }}</h4>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Data de nascimento: {{ \Carbon\Carbon::parse($paciente->data_nascimento)->format('d/m/y') }}</li>
                          <li class="list-group-item">nº de Identidade: {{ $paciente->n_bi }}</li>
                          <li class="list-group-item">Telefone: {{ $paciente->telefone }}</li>
                          <li class="list-group-item">Estado Civil: {{ $paciente->estado }}</li>
                          <li class="list-group-item">Provincia: {{ $paciente->provincia }}</li>
                          <li class="list-group-item">Municipio: {{ $paciente->municipio }}</li>
                        </ul>

                        <div class="d-flex justify-content-end mt-5 mb-3 mr-3">
                            <a class="btn btn-primary btn-lg " href="{{ route('paciente.edit',$paciente->id) }}">Editar Paciente</a>
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
