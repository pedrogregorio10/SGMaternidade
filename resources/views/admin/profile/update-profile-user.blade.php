
          <div class="col-12 col-md-12 col-lg-7">
            <div class="card">

            <form id="send-verification" method="post" action="{{ route('verification.send') }}" >
                @csrf
            </form>

              <form method="post" class="needs-validation" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="card-header">
                  <h4>Atualizar perfil</h4>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            @if (Auth::user()->image!=null)
                            <img class="img-fluid" src="{{ asset(Auth::user()->image) }}" alt="{{ Auth::user()->name }}" style="width:80px;height:auto; border-radius:50%">
                            @else
                                 <img alt="image" src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1 img-fluid" style="width: 80px; height:auto;">

                            @endif
                          </div>
                    </div>

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

                    <div class="row">
                      <div class="form-group col-md-6 col-12">

                        <label for="name">Nome</label>

                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name',$user->name)}}" autofocus autocomplete="name">

                        <div class="invalid-feedback">
                          @if ($errors->has('name'))
                            <code>{{ $errors->first('name') }}</code>
                          @endif
                        </div>
                      </div>

                      <div class="form-group col-md-6 col-12">

                        <label for="nickn">Apelido</label>

                        <input type="text" id="nickn" class="form-control" name="nickn" value="{{ old('nickn',$user->nickn)}}" autofocus autocomplete="nickn">

                        <div class="invalid-feedback">
                          @if ($errors->has('nickn'))
                            <code>{{ $errors->first('nickn') }}</code>
                          @endif
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="form-group col-md-7 col-12">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email',$user->email) }}" required>

                        <div class="invalid-feedback">
                          @if ($errors->has('email'))
                            <code>{{ $errors->first('email') }}</code>
                          @endif
                        </div>
                      </div>

                    </div>

                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Salvar alteração</button>
                </div>
              </form>
            </div>

          </div>


