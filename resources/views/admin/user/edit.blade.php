@extends('admin.layout.master')

@section('title','Silder Destaque')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Cadastrar Usuario</h1>

            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel de Controle</a></div>
              <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Usuario</a></div>
              <div class="breadcrumb-item">Editar</div>
            </div>
          </div>
      <div class="section-body">
        <div class="row mt-sm-4">

            <!-- EDIT nEW SLIDER -->

          <div class="col-12 col-md-12 col-lg-12">

            <div class="card">
              <form method="post" class="needs-validation" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-header">
                  <h4>Atualizar informação do slider</h4>

                  <div class='card-header-action'>
                        <a href="#" class="btn btn-primary">Ajuda?</a>
                  </div>
                </div>

                <div class="card-body">

                    <!--Motrar foto de perfil do usuario -->
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            @if ($user->image!=null)
                            <img class="img-fluid" src="{{ asset($user->image) }}" alt="{{ $user->name }}" style="width:80px;height:auto; border-radius:50%">
                            @else
                                    <img alt="image" src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1 img-fluid" style="width: 80px; height:auto;">

                            @endif
                            </div>
                    </div>

                    <!--Foto de Perfil -->
                    <div class="row">
                        <div class="form-group col-md-12 col-12">

                            <label for="image">Foto de Perfil</label>

                            <input type="file" id="image" class="form-control" name="image" autocomplete="image">

                            <div class="invalid-feedback">
                                @if ($errors->has('image'))
                                <code>{{ $errors->first('image') }}</code>
                                @endif
                            </div>
                            </div>
                    </div>

                    <!-- Nome Completo -->
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label for="name">Nome completo</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $user->name) }}" placeholder="Adicione o Nome" required>
                            @if ($errors->has('name'))
                                <code>{{ $errors->first('name') }}</code>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <!-- Tipo de Usuário -->
                        <div class="form-group col-md-12 col-12">
                            <label for="tipo">Tipo de Usuário</label>
                            <select id="tipo" class="form-control" name="tipo" required>
                                <option value="" disabled>Selecione o Tipo de Usuário</option>
                                <option value="admin" {{ $user->tipo == 'admin' ? 'selected' : '' }}>Administrador</option>
                                <option value="user" {{ $user->tipo == 'user' ? 'selected' : '' }}>User</option>
                                <option value="recep" {{ $user->tipo == 'recep' ? 'selected' : '' }}>Recepcionista</option>
                            </select>
                            @if ($errors->get('tipo'))
                                <code>{{ $errors->first('tipo') }}</code>
                            @endif
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="Adicione email válido" required>
                            @if ($errors->has('email'))
                                <code>{{ $errors->first('email') }}</code>
                            @endif
                        </div>
                    </div>

                    <!-- Telefone -->
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label for="telefone">Telefone</label>
                            <input type="text" id="telefone" class="form-control" name="telefone" placeholder="Seu Telefone" pattern="^\+244[0-9]{9}$" required value="{{ old('telefone',$user->telefone) }}">
                            @if ($errors->has('telefone'))
                                <code>{{ $errors->first('telefone') }}</code>
                            @endif
                        </div>
                    </div>

                    <!-- Província -->
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label for="provincia">Província</label>
                            <input type="text" id="provincia" class="form-control" name="provincia" value="{{ old('provincia', $user->provincia) }}" placeholder="Adicione a Província" required>
                            @if ($errors->has('provincia'))
                                <code>{{ $errors->first('provincia') }}</code>
                            @endif
                        </div>
                    </div>

                    <!-- Município -->
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label for="municipio">Município</label>
                            <input type="text" id="municipio" class="form-control" name="municipio" value="{{ old('municipio', $user->municipio) }}" placeholder="Adicione o Município" required>
                            @if ($errors->has('municipio'))
                                <code>{{ $errors->first('municipio') }}</code>
                            @endif
                        </div>
                    </div>

                    <!-- Senha -->
                    <div style="display:none ">
                        <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label for="password">Senha</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="Escolha uma nova Senha">
                            @if ($errors->has('password'))
                                <code>{{ $errors->first('password') }}</code>
                            @endif
                        </div>
                    </div>

                    <!-- Confirmar Senha -->
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label for="password_confirmation">Confirmar Senha</label>
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Confirme a nova Senha">
                        </div>
                    </div>
                </div>

                    <!-- Botão Salvar -->
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
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
