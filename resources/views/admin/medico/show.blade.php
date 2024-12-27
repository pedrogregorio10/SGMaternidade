@extends('admin.layout.master')

@section('title','Silder Destaque')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Gerir Medico</h1>

            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}" >Painel de Controle</a></div>
              <div class="breadcrumb-item">Medico</div>
            </div>
          </div>
      <div class="section-body">
        <div class="row mt-sm-4">

            <!-- Index nEW SLIDER -->
            <div class="col-12">

            <div class="card">

                <div class="card-header" >
                    <h4>Visualidar Medico</h4>
                    <div class="card-header-action">
                        <a class="btn btn-primary" href="{{ route('medico.index') }}">Voltar para lista</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">

                          <div class="col-md-4">

                                    @if ($user->image!=null)
                                    <img class="img-fluid rounded-start" src="{{ asset($user->image) }}" alt="{{ $user->name }}">
                                    @else
                                         <img alt="image" src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" class="img-fluid rounded-start">

                                    @endif

                          </div>

                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">{{ $user->name }}</h5>
                              <h6 class="card-title">{{ $user->email }}</h6>
                              <p class="card-text"><strong>Ordem:</strong> {{ $user->medico->ordem }}</p>
                              <p class="card-text"><strong>Especialidade:</strong> {{ $user->medico->especialidade }}</p>
                              <p class="card-text">Escala de Trabalho:
                                    <ul>
                                        @forelse ($user->escala as $escala)
                                            <li>{{ \Carbon\Carbon::parse($escala->data)->format('d/m/Y') }} com {{ $escala->quantidade}} de vaga restantes</li>
                                        @empty
                                            <li>Sem escalas cadastradas.</li>
                                        @endforelse
                                    </ul>

                            </p>

                            <div class="d-flex justify-content-end mt-5 mb-3 mr-3">
                            <a class="btn btn-primary btn-lg " href="{{ route('medico.edit',$user->id) }}">Editar Paciente</a>
                        </div>

                            </div>
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
