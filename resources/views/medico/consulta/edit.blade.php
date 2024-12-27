
    <form method="post" class="needs-validation" action="{{ route('consulta.update', $consulta->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="card-body">

        <!-- Status da consulta -->
        <div class="row">
            <div class="form-group col-md-12 col-12">
                <select name="status" id="status">
                    <option value="" disabled></option>
                    <option value="pendente" {{ $consulta->status == 'pendente'? 'selected':'' }}>Pendente</option>
                    <option value="pendente" {{ $consulta->status == 'confimada'? 'selected':'' }}>Confirmada</option>
                    <option value="cancelada" {{ $consulta->status == 'pendente'? 'selected':'' }}>Cancelada</option>
                </select>
                @if ($errors->has('status'))
                    <code>{{ $errors->first('status') }}</code>
                @endif
            </div>
        </div>
        <!-- Observações -->
        <div class="row">
            <div class="form-group col-md-12 col-12">
                <label for="observacoes">Observações</label>
                <textarea id="observacoes" class="form-control" name="observacoes" rows="3">{{ old('observacoes', $consulta->observacoes) }}</textarea>
                @if ($errors->has('observacoes'))
                    <code>{{ $errors->first('observacoes') }}</code>
                @endif
            </div>
        </div>

        <!-- Botão Salvar -->
        <div class="row">
            <div class="form-group col-md-12 col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-success btn-lg">Atualizar consulta</button>
            </div>
        </div>

    </div> <!-- Fim Card Body -->
</form>
