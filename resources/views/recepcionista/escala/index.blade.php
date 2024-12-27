@extends('recepcionista.layout.master')

@section('title','Silder Destaque')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Gerir Escala Medica</h1>

            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('recepcionista.dashboard') }}" >Painel de Controle</a></div>
              <div class="breadcrumb-item">Escala</div>
            </div>
          </div>
      <div class="section-body">
        <div class="row mt-sm-4">

            <!-- Index nEW SLIDER -->
            <div class="col-12">

            <div class="card">

                <div class="card-header" >
                    <h4>Todas as esclas Medica</h4>
                    <div class="card-header-action">
                        <a class="btn btn-primary" href="{{ route('escala.create') }}">Cadastrar novo</a>
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
  title: 'Editar slider',
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

