@extends('admin.layout.master')

@section('title','Silder Destaque')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Escala Medica</h1>

            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel de Controle</a></div>
              <div class="breadcrumb-item"><a href="{{ route('medico.index') }}">Escala</a></div>
              <div class="breadcrumb-item">Cadastrar</div>
            </div>
          </div>
      <div class="section-body">
        <div class="row mt-sm-4">

            <!-- CREATE nEW SLIDER -->

          <div class="col-12 col-md-12 col-lg-12">
            @if (session('sucess'))

            <div class="alert alert-success">{{ session('sucess') }}</div>

            @endif
            <div class="card">
              <form method="post" class="needs-validation" action="{{ route('escala.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-header">
                  <h4>Cadastrar escala Medica</h4>

                  <div class='card-header-action'>
                        <a href="#" class="btn btn-primary">Ajuda?</a>
                  </div>
                </div>

                <div class="card-body">

                    <div class="row">
                        <!-- Data -->
                        <div class="form-group col-md-6">
                            <label for="data">Data</label>
                            <input id="data" type="date" class="form-control" name="data" value="{{ old('data') }}" required>
                            @if ($errors->has('data'))
                                <code>{{ $errors->first('data') }}</code>
                            @endif
                        </div>

                        <!-- Hora
                        <div class="form-group col-md-6">
                            <label for="hora">Hora</label>
                            <input id="hora" type="time" class="form-control" name="hora" value="{{ old('hora') }}" required>
                            @if ($errors->has('hora'))
                                <code>{{ $errors->first('hora') }}</code>
                            @endif
                        </div>
                        -->
                    </div>

                    <div class="row">
                        <!-- Médico -->
                        <div class="form-group col-md-12">
                            <label for="id_medico">Médico</label>
                            <select id="id_medico" class="form-control" name="id_medico" required>
                                <option value="">Selecione um médico</option>
                                <!-- Lista de médicos carregada dinamicamente -->
                                @foreach ($medicos as $medico)
                                    <option value="{{ $medico->id }}">{{ $medico->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('id_medico'))
                                <code>{{ $errors->first('id_medico') }}</code>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="quantidade">Quantidade de Pacientes</label>
                        <input id="quantidade" type="number" class="form-control" name="quantidade" value="{{ old('quantidade') }}" required placeholder="Número de pacientes que podem ser atendidos">
                        @if ($errors->has('quantidade'))
                            <code>{{ $errors->first('quantidade') }}</code>
                        @endif
                    </div>


                    <div class="form-group">
                        <!-- Botão de Enviar -->
                        <button type="submit" class="btn btn-primary">Salvar Horário</button>
                    </div>


<!--END-->
                </div>
            </form>
            </div>

          </div>
        </div>
      </div>
    </section>
</div>

@endsection
