@extends('admin.layout.master')

@section('title','Silder Destaque')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Gerenciar funcionario</h1>

            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel de Controle</a></div>
              <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Funcionarios</a></div>
              <div class="breadcrumb-item">Criar</div>
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
              <form method="post" class="needs-validation" action="{{ route('user.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-header">
                  <h4>Cadastrar Funcionario</h4>

                  <div class='card-header-action'>
                        <a href="#" class="btn btn-primary">Ajuda?</a>
                  </div>
                </div>

                <div class="card-body">

                    <!-- Foto de ferfil -->
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
                        <input type="text" id="name" class="form-control" name="name" placeholder="Adicione o Nome" required>
                        @if ($errors->has('name'))
                            <code>{{ $errors->first('name') }}</code>
                        @endif
                    </div>
                </div>

                <!-- Email -->
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Adicione email válido" required>
                        @if ($errors->has('email'))
                            <code>{{ $errors->first('email') }}</code>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <!-- Tipo de Usuário -->
                    <div class="form-group col-md-12 col-12">
                        <label for="tipo">Tipo de Usuário</label>
                        <select id="tipo" class="form-control" name="tipo" required>
                            <option value="" disabled selected>Selecione o Tipo de Usuário</option>
                            <option value="admin">Administrador</option>
                            <option value="user">User</option>
                            <option value="recep">Recepcionista</option>
                        </select>
                        @if ($errors->get('tipo'))
                            <code>{{ $errors->first('tipo') }}</code>
                        @endif
                    </div>
                </div>

                <!-- Telefone -->
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label for="telefone">Telefone</label>
                        <input type="text" id="telefone" class="form-control" name="telefone" placeholder="Seu Telefone" pattern="^\+244[0-9]{9}$" required value="+244">
                        @if ($errors->has('telefone'))
                            <code>{{ $errors->first('telefone') }}</code>
                        @endif
                    </div>
                </div>

                <!-- Província -->
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label for="provincia">Província</label>
                        <input type="text" id="provincia" class="form-control" name="provincia" placeholder="Adicione a Província" required>
                        @if ($errors->has('provincia'))
                            <code>{{ $errors->first('provincia') }}</code>
                        @endif
                    </div>
                </div>

                <!-- Município -->
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label for="municipio">Município</label>
                        <input type="text" id="municipio" class="form-control" name="municipio" placeholder="Adicione o Município" required>
                        @if ($errors->has('municipio'))
                            <code>{{ $errors->first('municipio') }}</code>
                        @endif
                    </div>
                </div>

                <!-- Senha -->
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label for="password">Senha</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Escolha uma Senha" required>
                        @if ($errors->has('password'))
                            <code>{{ $errors->first('password') }}</code>
                        @endif
                    </div>
                </div>

                <!-- Confirmar Senha -->
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label for="password_confirmation">Confirmar Senha</label>
                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Confirme a Senha" required>
                    </div>
                </div>

                <!-- Botão Salvar -->
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <button type="submit" class="btn btn-primary">Salvar</button>
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
