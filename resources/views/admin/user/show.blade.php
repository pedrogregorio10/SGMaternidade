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
                    <h4>Todos os Medicos</h4>
                    <div class="card-header-action">
                        <a class="btn btn-primary" href="{{ route('medico.create') }}">Cadastrar novo</a>
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
                          <p class="card-text"><strong>Acesso:</strong> {{ $user->tipo }}</p>
                          <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>

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
