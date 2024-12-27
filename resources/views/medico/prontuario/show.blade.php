
{{-- Protuario --}}
<div class="col-md-6">
<div class="card">

<div class="card-header">
<h4>Prontuario do paciente</h4>
</div>
<ul class="list-group list-group-flush">
<li class="list-group-item">Diagnóstico
    <p>{{ $prontuario->diagnostico}}</p>
</li>
<li class="list-group-item ">Tratamento
    <p>{{ $prontuario->tratamento}}</p>
</li>
<li class="list-group-item">Exames solicitados
    <p>{{ $prontuario->exames_solicitados}}</p>
</li>
{{-- chamar exame --}}
<li class="list-group-item">Prescrição Médica
    <p>{{ $prontuario->prescricao}}</p>
</li>
</ul>


<div class="d-flex justify-content-end mt-5 mb-3 mr-3">
    <a class="btn btn-primary btn-lg mr-3" href="{{ route('prontuario.edit',$prontuario->id) }}">Editar prontuario</a>
</div>

</div>
</div>


{{-- Fim Protuario --}}
