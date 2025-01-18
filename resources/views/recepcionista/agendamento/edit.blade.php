@extends('recepcionista.layout.master')

@section('title','Atualizar Agendamento')

@section('content')

<div class="main-content">
<section class="section">

<div class="section-header">
<h1>Atualizar Agendamento</h1>

<div class="section-header-breadcrumb">
<div class="breadcrumb-item active"><a href="{{ route('recepcionista.dashboard') }}">Painel de Controle</a></div>
<div class="breadcrumb-item"><a href="#">Agendamento</a></div>
<div class="breadcrumb-item">Atualizar Consulta</div>
</div>
</div>

<div class="section-body">
<div class="row mt-sm-4">

<!-- Atualização de Agendamento -->

<div class="col-12 col-md-12 col-lg-12">
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
<div class="card-header bg-warning">
<h6>Você está atualizando o agendamento do doctor
<span style="font-weight: 700; color:aliceblue">{{ $agendamento->medico->name }}</span>
especialista em <span style="font-weight: 700; color:aliceblue">{{ $agendamento->medico->medico->especialidade }}</span>
</h6>
</div>

<form method="post" class="needs-validation" action="{{ route('agendamento.update', $agendamento->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="card-header">
<h4>Atualizar Dados do Agendamento</h4>
<div class='card-header-action'>
<a href="#" class="btn btn-primary">Ajuda?</a>
</div>
</div>

<div class="card-body">

<!-- Nome -->
<div class="row">
<div class="form-group col-md-12 col-12">
<label for="nome">Nome</label>
<input type="text" id="nome" class="form-control" name="nome" value="{{ old('nome', $agendamento->nome) }}" placeholder="Nome Completo" required>
@if ($errors->has('nome'))
<code>{{ $errors->first('nome') }}</code>
@endif
</div>
</div>

<!-- Data de Nascimento -->
<div class="row">
<div class="form-group col-md-12 col-12">
<label for="data_nascimento">Data de Nascimento</label>
<input type="date" id="data_nascimento" class="form-control" name="data_nascimento" value="{{ old('data_nascimento', $agendamento->data_nascimento) }}" required>
@if ($errors->has('data_nascimento'))
<code>{{ $errors->first('data_nascimento') }}</code>
@endif
</div>
</div>

<!-- Número do BI -->
<div class="row">
<div class="form-group col-md-12 col-12">
<label for="n_bi">Número do BI</label>
<input type="text" id="n_bi" class="form-control" name="n_bi" value="{{ old('n_bi', $agendamento->n_bi) }}" placeholder="Exemplo: 007303883BA054" pattern="^[0-9]{9}[A-Za-z]{2}[0-9]{3}$" required>
@if ($errors->has('n_bi'))
<code>{{ $errors->first('n_bi') }}</code>
@endif
</div>
</div>

<!-- Província -->
<div class="row">
<div class="form-group col-md-12 col-12">
<label for="provincia">Província</label>
<input type="text" id="provincia" class="form-control" name="provincia" value="{{ old('provincia', $agendamento->provincia) }}" placeholder="Província" required>
@if ($errors->has('provincia'))
<code>{{ $errors->first('provincia') }}</code>
@endif
</div>
</div>

<!-- Município -->
<div class="row">
<div class="form-group col-md-12 col-12">
<label for="municipio">Município</label>
<input type="text" id="municipio" class="form-control" name="municipio" value="{{ old('municipio', $agendamento->municipio) }}" placeholder="Município" required>
@if ($errors->has('municipio'))
<code>{{ $errors->first('municipio') }}</code>
@endif
</div>
</div>

<!-- Telefone -->
<div class="row">
<div class="form-group col-md-12 col-12">
<label for="telefone">Telefone</label>
<input type="text" id="telefone" class="form-control" name="telefone" value="{{ old('telefone', $agendamento->telefone) }}" placeholder="Seu Telefone" pattern="^\+244[0-9]{9}$" required>
@if ($errors->has('telefone'))
<code>{{ $errors->first('telefone') }}</code>
@endif
</div>
</div>

<!-- Estado Civil -->
<div class="row">
<div class="form-group col-md-12 col-12">
<label for="estado">Estado Civil</label>
<select id="estado" class="form-control" name="estado" required>
<option value="">Selecione o Estado Civil</option>
<option value="solteiro/a" {{ old('estado', $agendamento->estado) == 'solteiro/a' ? 'selected' : '' }}>Solteiro(a)</option>
<option value="casado/a" {{ old('estado', $agendamento->estado) == 'casado/a' ? 'selected' : '' }}>Casado(a)</option>
</select>
@if ($errors->has('estado'))
<code>{{ $errors->first('estado') }}</code>
@endif
</div>
</div>

<!-- Tipo de Consulta -->
<div class="row">
<div class="form-group col-md-12 col-12">
<label for="tipo">Tipo de Consulta</label>
<select id="tipo" class="form-control" name="tipo" required>
<option value="">Selecione o Tipo</option>
<option value="pre" {{ old('tipo', $agendamento->tipo) == 'pre' ? 'selected' : '' }}>Pré</option>
<option value="pos" {{ old('tipo', $agendamento->tipo) == 'pos' ? 'selected' : '' }}>Pós</option>
</select>
@if ($errors->has('tipo'))
<code>{{ $errors->first('tipo') }}</code>
@endif
</div>
</div>

<input type="hidden" name="id_medico" value="{{ $agendamento->id_medico }}">

<!-- Horário -->
<div class="row">
<div class="form-group col-md-12 col-12">
<label for="id_escala">Datas Disponíveis</label>
<select id="id_escala" class="form-control" name="id_escala" required>
<option value="" disabled>Selecione a Data</option>
@foreach ($escalas as $escala)
@if ($escala->quantidade > 0)
<option value="{{ $escala->id }}" {{ old('id_escala', $agendamento->id_escala) == $escala->id ? 'selected' : '' }}>
{{ \Carbon\Carbon::parse($escala->data)->format('d/m/Y') }} - (Vagas: {{ $escala->quantidade }})
</option>
@endif
@endforeach
</select>
@if ($errors->has('id_escala'))
<code>{{ $errors->first('id_escala') }}</code>
@endif
</div>
</div>

<!-- Observações -->
<div class="row">
<div class="form-group col-md-12 col-12">
<label for="observacoes">Observações</label>
<textarea id="observacoes" class="form-control" name="observacoes" rows="3">{{ old('observacoes', $agendamento->observacoes) }}</textarea>
@if ($errors->has('observacoes'))
<code>{{ $errors->first('observacoes') }}</code>
@endif
</div>
</div>

<!-- Botão Salvar -->
<div class="row">
<div class="form-group col-md-12 col-12">
<button type="submit" class="btn btn-primary">Atualizar Agendamento</button>
</div>
</div>

</div> <!-- Fim Card Body -->
</form>

</div> <!-- Fim Card -->

</div>
</div>
</div>
</section>
</div>

@endsection
