@extends('admin.layout.master')

@section('title','paciente Destaque')

@section('content')


<div class="main-content">


    <section class="section">

        <div class="section-header">
            <h1>Editar Paciente</h1>

            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel de Controle</a></div>
            <div class="breadcrumb-item"><a href="{{ route('paciente.index') }}">Paciente</a></div>
            <div class="breadcrumb-item">Cadastrar</div>
            </div>
        </div>

        <div class="section-body">
        <div class="row mt-sm-4">

            <!-- CREATE nEW paciente -->

        <div class="col-12 col-md-12 col-lg-12">
            @if (session('sucess'))

            <div class="alert alert-success">{{ session('sucess') }}</div>

            @endif
            <div class="card">
            <form method="post" class="needs-validation" action="{{ route('paciente.update',$paciente->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h4>Editar dodos do Paciente: {{$paciente->nome}}</h4>
                    <div class='card-header-action'>
                        <a href="#" class="btn btn-primary">Ajuda?</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row">
                        <!-- Nome -->
                        <div class="form-group col-md-12 col-12">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" class="form-control" name="nome" placeholder="Nome Completo" required value="{{ old('nome',$paciente->nome) }}">
                            @if ($errors->has('nome'))
                                <code>{{ $errors->first('nome') }}</code>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <!-- Data de Nascimento -->
                        <div class="form-group col-md-12 col-12">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="date" id="data_nascimento" class="form-control" name="data_nascimento" required value="{{ old('data_nascimento',$paciente->data_nascimento) }}">
                            @if ($errors->has('data_nascimento'))
                                <code>{{ $errors->first('data_nascimento') }}</code>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <!-- Número do BI -->
                        <div class="form-group col-md-12 col-12">
                            <label for="n_bi">Número do BI</label>
                            <input type="text" id="n_bi" class="form-control" name="n_bi" placeholder="Exemplo: 007303883BA054" pattern="^[0-9]{9}[A-Za-z]{2}[0-9]{3}$" required value="{{ old('n_bi',$paciente->n_bi) }}">
                            @if ($errors->has('n_bi'))
                                <code>{{ $errors->first('n_bi') }}</code>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <!-- Província -->
                        <div class="form-group col-md-12 col-12">
                            <label for="provincia">Província</label>
                            <input type="text" id="provincia" class="form-control" name="provincia" placeholder="Província" required value="{{ old('provincia',$paciente->provincia) }}">
                            @if ($errors->has('provincia'))
                                <code>{{ $errors->first('provincia') }}</code>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <!-- Município -->
                        <div class="form-group col-md-12 col-12">
                            <label for="municipio">Município</label>
                            <input type="text" id="municipio" class="form-control" name="municipio" placeholder="Município" required value="{{ old('municipio',$paciente->municipio) }}">
                            @if ($errors->has('municipio'))
                                <code>{{ $errors->first('municipio') }}</code>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <!-- Telefone -->
                        <div class="form-group col-md-12 col-12">
                            <label for="telefone">Telefone</label>
                            <input type="text" id="telefone" class="form-control" name="telefone" placeholder="Seu Telefone" pattern="^\+244[0-9]{9}$" required value="{{ old('telefone',$paciente->telefone) }}">
                            @if ($errors->has('telefone'))
                                <code>{{ $errors->first('telefone') }}</code>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <!-- Estado Civil -->
                        <div class="form-group col-md-12 col-12">
                            <label for="estado">Estado Civil</label>
                            <select id="estado" class="form-control" name="estado" required>
                                <option value="" disabled>Selecione o Estado Civil</option>
                                <option value="solteiro/a" {{ $paciente->estado =='solteiro/o'? 'selected':''}}>Solteiro(a)</option>
                                <option value="casado/a" {{ $paciente->estado == 'casado/a' ? 'selected':'' }} >Casado(a)</option>
                            </select>
                            @if ($errors->has('estado'))
                                <code>{{ $errors->first('estado') }}</code>
                            @endif
                        </div>
                    </div>

                    <!-- Botão Salvar -->
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <button type="submit" class="btn btn-primary">Confirmar Agenda</button>
                        </div>
                    </div>

                <!-- Fim Card Body -->

                </form>
            </div>

        </div>
        </div>
    </div>
    </section>


</div>

@endsection
