@extends('medico.layout.master')

@section('title','Consulta')

@section('content')

<div class="main-content">
<section class="section">

<div class="section-header">
<h1>Editar Prontuario</h1>

<div class="section-header-breadcrumb">
<div class="breadcrumb-item active"><a href="{{ route('view.medico.dashboard') }}" >Painel de Controle</a></div>
<div class="breadcrumb-item">consulta</div>
</div>
</div>
<div class="section-body">
<div class="row mt-sm-4">

<!-- Index nEW consulta -->
<div class="col-12">

<div class="card">

<div class="card-header" >
<h4>Paciente: {{ $consulta->paciente->nome }}</h4>
</div>

<div class="card-body bg-dark">
<div class="row">
<div class="col-md-6">
<div class="card">

<div class="card-header">
<h4>Nome do paciente: {{  $consulta->paciente->nome }}</h4>
</div>
<ul class="list-group list-group-flush">
<li class="list-group-item">Nº BI:{{ $consulta->paciente->n_bi}}</li>
<li class="list-group-item">Tipo de Consulta: {{ $consulta->tipo}} natal</li>
{{-- <li class="list-group-item">Data da consulta: {{ \Carbon\Carbon::parse($consulta->escala->data)->format('d/m/y') }}</li> --}}
<li class="list-group-item">Motivo da consulta: {{ $consulta->observacoes }}</li>
<li class="list-group-item">status: {{ $consulta->status }}</li>


<li class="list-group-item">Observações (durante/após a consulta): {{ $consulta->observacoes ? '':'n/a' }}
@if (isset($consulta->observacoes) || !empty($consulta->observacoes))
<p>
{{ $consulta->observacoes}}
</p>
@endif
</li>

@if (!isset($consulta->observacoes) || empty($consulta->observacoes))
@include('medico.consulta.edit')
@endif
<!-- Modal -->
@if (!isset($prontuario) || empty($prontuario))
<button id="btnRegistrarProntuario" class="btn btn-primary">
    Registrar Prontuário
</button>
@endif
</div>
</ul>
</div>

{{-- Protuario --}}
<div class="col-md-6">
    <div class="card">

    <div class="card-header">
    <h4>Registrar Prontuario</h4>
    </div>

    <form method="post" class="needs-validation" action="{{ route('prontuario.update',$prontuario->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <!-- Diagnóstico -->
                <div class="form-group col-md-12 col-12">
                    <label for="diagnostico">Diagnóstico</label>
                    <input type="text" id="diagnostico" class="form-control" name="diagnostico" placeholder="Diagnóstico" required value="{{ old('diagnostico',$prontuario->diagnostico) }}">
                    @if ($errors->has('diagnostico'))
                        <code>{{ $errors->first('diagnostico') }}</code>
                    @endif
                </div>
            </div>

            <div class="row">
                <!-- Tratamento -->
                <div class="form-group col-md-12 col-12">
                    <label for="tratamento">Prescrição Médica</label>
                    <textarea id="tratamento" class="form-control" name="tratamento" placeholder="Prescrição médica" rows="3">{{ old('tratamento', $prontuario->tratamento) }}</textarea>
                    @if ($errors->has('tratamento'))
                        <code>{{ $errors->first('tratamento') }}</code>
                    @endif
                </div>
            </div>




            <div class="row">
                <!-- Exames Solicitados -->
                <div class="form-group col-md-12 col-12">
                    <label for="exames_solicitados">Exames Solicitados</label>
                    <textarea id="exames_solicitados" class="form-control" name="exames_solicitados" placeholder="exames_solicitados" rows="3">{{ old('exames_solicitados', $prontuario->exames_solicitados) }}</textarea>
                    @if ($errors->has('exames_solicitados'))
                        <code>{{ $errors->first('exames_solicitados') }}</code>
                    @endif
                </div>
            </div>

            <div class="row">
                <!-- Prescrição -->
                <div class="form-group col-md-12 col-12">
                    <label for="prescricao">Prescrição Médica</label>
                    <textarea id="prescricao" class="form-control" name="prescricao" placeholder="Prescrição médica" rows="3">{{ old('prescricao', $prontuario->prescricao) }}</textarea>
                    @if ($errors->has('prescricao'))
                        <code>{{ $errors->first('prescricao') }}</code>
                    @endif
                </div>
            </div>

            <!-- Botão Salvar -->
            <div class="row">
                <div class="form-group col-md-12 col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-lg">Salvar Alteração</button>
                </div>
            </div>

        </div> <!-- Fim Card Body -->
    </form>

    </div>
</div>
{{-- Update --}}

</div>

</div>
</div>
</div>
</div>
</div>
</section>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Selecionar elementos
const btnRegistrarProntuario = document.getElementById('btnRegistrarProntuario');
const prontuarioForm = document.getElementById('prontuarioForm');

// Adicionar evento de clique no botão
btnRegistrarProntuario.addEventListener('click', () => {
    // Alternar exibição do formulário
    prontuarioForm.style.display = prontuarioForm.style.display === 'none' ? 'block' : 'none';
});
</script>
@endsection


