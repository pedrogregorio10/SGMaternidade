
          <div class="col-12 col-md-12 col-lg-7">
            @if (session('sucess') == 'update-password')

            <div class="alert alert-success">Parabens, Campo alterado com sucesso!</div>

            @endif
            <div class="card">
              <form method="post" class="needs-validation" action="{{ route('admin.update.password') }}">
                @csrf

                <div class="card-header">
                  <h4>Alterar palavra passe</h4>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-md-7 col-12">

                            <label for="current_password">Palavra passe atual</label>

                            <input type="password" id="current_password" class="form-control" name="current_password" autocomplete="current_password">

                            @if ($errors->get('current_password'))
                            <code>{{ $errors->first('current_password') }}</code>
                            @endif

                          </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-7 col-12">

                        <label for="password">Nova palavra passe</label>

                        <input type="password" id="password" class="form-control" name="password" autofocus autocomplete="password">

                        @if ($errors->get('password'))
                            <code> {{ $errors->first('password') }} </code>
                        @endif

                      </div>

                    </div>

                    <div class="row">
                      <div class="form-group col-md-7 col-12">
                        <label for="password_confirmation">Confirmar palavra passe</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                      </div>

                    </div>

                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Salvar</button>
                </div>
              </form>
            </div>

          </div>

