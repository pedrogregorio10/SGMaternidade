@extends('recepcionista.layout.master')

@section('title','agendamento')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Gerenciar agendamento</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('recepcionista.dashboard') }}">Painel de Controle</a></div>
                <div class="breadcrumb-item"><a href="#}">agendamento</a></div>
                <div class="breadcrumb-item">Agendar Consulta</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row mt-sm-4">

                <!-- Agendamento -->

                <div class="col-12 col-md-12 col-lg-12">
                    @if (session('sucess'))
                        <div class="alert alert-success">{{ session('sucess') }}</div>
                    @endif

                    <div class="card">
                        <div class="card-header bg-warning">
                                <h6  >Voce esta fazendo agendamento para o doctor <span style="font-weight: 700; color:aliceblue"> {{ $user->name }} </span> especialista <span style="font-weight: 700; color:aliceblue"> {{ $user->medico->especialidade }} </span></h6>
                        </div>


                        <form method="post" class="needs-validation" action="{{ route('agendamento.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-header">
                                <h4>Pedido de Agendamento</h4>
                                <div class='card-header-action'>
                                    <a href="#" class="btn btn-primary">Ajuda?</a>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <!-- Nome -->
                                    <div class="form-group col-md-12 col-12">
                                        <label for="nome">Nome</label>
                                        <input type="text" id="nome" class="form-control" name="nome" placeholder="Nome Completo" required>
                                        @if ($errors->has('nome'))
                                            <code>{{ $errors->first('nome') }}</code>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Data de Nascimento -->
                                    <div class="form-group col-md-12 col-12">
                                        <label for="data_nascimento">Data de Nascimento</label>
                                        <input type="date" id="data_nascimento" class="form-control" name="data_nascimento" required>
                                        @if ($errors->has('data_nascimento'))
                                            <code>{{ $errors->first('data_nascimento') }}</code>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Número do BI -->
                                    <div class="form-group col-md-12 col-12">
                                        <label for="n_bi">Número do BI</label>
                                        <input type="text" id="n_bi" class="form-control" name="n_bi" placeholder="Exemplo: 007303883BA054" pattern="^[0-9]{9}[A-Za-z]{2}[0-9]{3}$" required>
                                        @if ($errors->has('n_bi'))
                                            <code>{{ $errors->first('n_bi') }}</code>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Província -->
                                    <div class="form-group col-md-12 col-12">
                                        <label for="provincia">Província</label>
                                        <input type="text" id="provincia" class="form-control" name="provincia" placeholder="Província" required>
                                        @if ($errors->has('provincia'))
                                            <code>{{ $errors->first('provincia') }}</code>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Município -->
                                    <div class="form-group col-md-12 col-12">
                                        <label for="municipio">Município</label>
                                        <input type="text" id="municipio" class="form-control" name="municipio" placeholder="Município" required>
                                        @if ($errors->has('municipio'))
                                            <code>{{ $errors->first('municipio') }}</code>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Telefone -->
                                    <div class="form-group col-md-12 col-12">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" id="telefone" class="form-control" name="telefone" placeholder="Seu Telefone" value="+244" pattern="^\+244[0-9]{9}$" required>
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
                                            <option value="">Selecione o Estado Civil</option>
                                            <option value="solteiro/a">Solteiro(a)</option>
                                            <option value="casado/a">Casado(a)</option>
                                        </select>
                                        @if ($errors->has('estado'))
                                            <code>{{ $errors->first('estado') }}</code>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Tipo de Consulta -->
                                    <div class="form-group col-md-12 col-12">
                                        <label for="tipo">Tipo de Consulta</label>
                                        <select id="tipo" class="form-control" name="tipo" required>
                                            <option value="">Selecione o Tipo</option>
                                            <option value="pre">Pré</option>
                                            <option value="pos">Pós</option>
                                        </select>
                                        @if ($errors->has('tipo'))
                                            <code>{{ $errors->first('tipo') }}</code>
                                        @endif
                                    </div>
                                </div>

                                <input type="hidden" name="id_medico" value="{{ $user->id }}">


                                <div class="row">
                                    <!-- Horário -->
                                    <div class="form-group col-md-12 col-12">
                                        <label for="horario">Datas Disponíveis</label>
                                        <select id="id_escala" class="form-control" name="id_escala" required>
                                            <option value="" disabled selected>Selecione a Data</option>
                                            @foreach ($user->escala as $escala)
                                                @if ($escala->quantidade>0)
                                                    <option value="{{ $escala->id }}">
                                                    {{ \Carbon\Carbon::parse($escala->data)->format('d/m/Y') }}- (Vagas: {{ $escala->quantidade }})
                                                    </option>
                                                @endif


                                            @endforeach
                                        </select>
                                        @if ($errors->has('id_escala'))
                                            <code>{{ $errors->first('id_escala') }}</code>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Observações -->
                                    <div class="form-group col-md-12 col-12">
                                        <label for="motivo">Observações</label>
                                        <textarea id="motivo" class="form-control" name="motivo" rows="3" placeholder="Observações adicionais"></textarea>
                                        @if ($errors->has('motivo'))
                                            <code>{{ $errors->first('motivo') }}</code>
                                        @endif
                                    </div>
                                </div>

                                <!-- Botão Salvar -->
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <button type="submit" class="btn btn-primary">Confirmar Agenda</button>
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
