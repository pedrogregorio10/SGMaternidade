@extends('admin.layout.master')
@section('title','Profile')
@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Meus dados</h1>

            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel de Controle</a></div>
              <div class="breadcrumb-item">Perfil</div>
            </div>
          </div>
      <div class="section-body">
        <div class="row mt-sm-4">


            <!-- UPDATE PROFILE DATA -->
            @include('admin.profile.update-profile-user')
            <!-- UPDATE PASSWORD USER -->
            @include('admin.profile.update-password-user')

        </div>
      </div>
    </section>
</div>

@endsection
