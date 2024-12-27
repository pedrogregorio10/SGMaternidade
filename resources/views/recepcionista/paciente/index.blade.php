@extends('recepcionista.layout.master')

@section('title','Paciente')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Gerir Pacintes</h1>

            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('recepcionista.dashboard') }}" >Painel de Controle</a></div>
              <div class="breadcrumb-item">Pacientes</div>
            </div>
          </div>
      <div class="section-body">
        <div class="row mt-sm-4">

            <!-- Index nEW paciente -->
            <div class="col-12">

            <div class="card">

                <div class="card-header" >
                    <h4>Todos os Pacientes</h4>
                    <div class="card-header-action">
                        <a class="btn btn-primary" href="{{ route('paciente.create') }}">Cadastrar novo</a>
                    </div>
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

<script>
    function getId(btn){
    alert(btn.id)
$("#"+btn.id).fireModal({
  title: 'Editar paciente',
  body: $(".modal-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
});
}
</script>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

