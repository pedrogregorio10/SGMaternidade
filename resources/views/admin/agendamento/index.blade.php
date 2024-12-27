@extends('admin.layout.master')

@section('title','agendamento')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Lista de consulta agendada</h1>

            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}" >Painel de Controle</a></div>
              <div class="breadcrumb-item">Lista agendamento</div>
            </div>
          </div>
      <div class="section-body">
        <div class="row mt-sm-4">

            <!-- Index nEW SLIDER -->
            <div class="col-12">

            <div class="card">

                <div class="card-header" >
                    <h3>Visualizar lista de agendamento</h3><br>

                </div>

                <div class="card-body">

                    {{ $dataTable->table() }}

                </div>

            </div>
            </div>


        </div>
      </div>
    </section>


</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush


@endsection



