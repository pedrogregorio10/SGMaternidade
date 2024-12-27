@extends('recepcionista.layout.master')

@section('title','Silder Destaque')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Agendar Consulta</h1>

            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('recepcionista.dashboard') }}" >Painel de Controle</a></div>
              <div class="breadcrumb-item">Agendar</div>
            </div>
          </div>
      <div class="section-body">
        <div class="row mt-sm-4">

            <!-- Index nEW SLIDER -->
            <div class="col-12">

            <div class="card">

                <div class="card-header" >
                    <h3>Selecione o Especialista desejado</h3><br>

                </div>

                <div class="card-header" >
                    <h6>
                    @if ($users->count()==0)
                    <p>Os agendamentos terminaram, aguarde as proximas datas. Obrigado!</p>
                    @endif
                    </h6>
                </div>

                <div class="card-body">

                    @foreach ($users as $user)

                    <div class="card mb-3">
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
                                            @if($escala->quantidade>0)
                                            <li>{{ \Carbon\Carbon::parse($escala->data)->format('d/m/Y') }} com {{ $escala->quantidade}} de vaga restantes</li>
                                            @endif
                                        @empty
                                            <li>Sem escalas cadastradas.</li>
                                        @endforelse
                                    </ul>

                            </p>
                            <!-- Alinhamento do botão -->
                                <!-- Flexbox para alinhamento -->
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-success btn-lg" href="{{ route('recepcionista.agendar',$user->id) }}">Agendar</a>
                        </div>


                            </div>
                          </div>






                        </div>


                      </div>

                    @endforeach


                </div>

            </div>
            </div>


        </div>
      </div>
    </section>


</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection



