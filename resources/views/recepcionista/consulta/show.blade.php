@extends('medico.layout.master')

@section('title','Consulta')

@section('content')

<div class="main-content">
<section class="section">

<div class="section-header">
<h1>Dados da consulta</h1>

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

@if (isset($prontuario) || !empty($prontuario))
@include('medico.prontuario.show')
@endif

@include('medico.prontuario.create')


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


