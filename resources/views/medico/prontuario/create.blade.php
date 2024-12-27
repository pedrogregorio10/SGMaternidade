
{{-- Protuario --}}
<div class="col-md-6">
    <div id="prontuarioForm" style="display:none ">
    <div class="card">

    <div class="card-header">
    <h4>Registrar Prontuario</h4>
    </div>

    <form method="post" class="needs-validation" action="{{ route('prontuario.store') }}" enctype="multipart/form-data">
        @csrf
            <input type="hidden" name="id_consulta" value="{{ $consulta->id }}">
        <div class="card-body">
            <div class="row">
                <!-- Diagnóstico -->
                <div class="form-group col-md-12 col-12">
                    <label for="diagnostico">Diagnóstico</label>
                    <input type="text" id="diagnostico" class="form-control" name="diagnostico" placeholder="Diagnóstico" required>
                    @if ($errors->has('diagnostico'))
                        <code>{{ $errors->first('diagnostico') }}</code>
                    @endif
                </div>
            </div>

            <div class="row">
                <!-- Tratamento -->
                <div class="form-group col-md-12 col-12">
                    <label for="tratamento">Tratamento</label>
                    <textarea id="tratamento" class="form-control" name="tratamento" placeholder="Tratamento sugerido" rows="3"></textarea>
                    @if ($errors->has('tratamento'))
                        <code>{{ $errors->first('tratamento') }}</code>
                    @endif
                </div>
            </div>

            <div class="row">
                <!-- Exames Solicitados -->
                <div class="form-group col-md-12 col-12">
                    <label for="exames_solicitados">Exames Solicitados</label>
                    <input type="text" id="exames_solicitados" class="form-control" name="exames_solicitados" placeholder="Exames Solicitados">
                    @if ($errors->has('exames_solicitados'))
                        <code>{{ $errors->first('exames_solicitados') }}</code>
                    @endif
                </div>
            </div>

            <div class="row">
                <!-- Prescrição -->
                <div class="form-group col-md-12 col-12">
                    <label for="prescricao">Prescrição Médica</label>
                    <textarea id="prescricao" class="form-control" name="prescricao" placeholder="Prescrição médica" rows="3"></textarea>
                    @if ($errors->has('prescricao'))
                        <code>{{ $errors->first('prescricao') }}</code>
                    @endif
                </div>
            </div>

            <!-- Botão Salvar -->
            <div class="row">
                <div class="form-group col-md-12 col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-lg">Registrar Prontuario</button>
                </div>
            </div>

        </div> <!-- Fim Card Body -->
    </form>

    </div>

</div>
</div>

