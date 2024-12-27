@extends('admin.layout.master')

@section('title','Silder Destaque')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Cadastrar slider</h1>

            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel de Controle</a></div>
              <div class="breadcrumb-item"><a href="{{ route('slider.index') }}">Slider</a></div>
              <div class="breadcrumb-item">Editar</div>
            </div>
          </div>
      <div class="section-body">
        <div class="row mt-sm-4">

            <!-- EDIT nEW SLIDER -->

          <div class="col-12 col-md-12 col-lg-12">

            <div class="card">
              <form method="post" class="needs-validation" action="{{ route('slider.update',$slider->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-header">
                  <h4>Atualizar informação do slider</h4>

                  <div class='card-header-action'>
                        <a href="#" class="btn btn-primary">Ajuda?</a>
                  </div>
                </div>

                <div class="card-body">

                <div class="row">
                    <div class="form-group col-md-12 col-12">

                        <label for="banner">Imagem[1300x500px]</label>

                        <input type="file" id="banner" class="form-control" name="banner" autocomplete="banner">

                        @if ($errors->get('banner'))
                        <code>{{ $errors->first('banner') }}</code>
                        @endif

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12 col-12">

                        <label for="title1">Titulo 1</label>

                        <input type="text" id="title1" class="form-control" name="title1" autofocus autocomplete="title1" placeholder="Adicione o titulo" value="{{ old('title1',$slider->title1) }}">

                        @if ($errors->get('title1'))
                            <code> {{ $errors->first('title1') }} </code>
                        @endif

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12 col-12">

                        <label for="title2">Titulo 2</label>

                        <input type="text" id="title2" class="form-control" name="title2" autofocus autocomplete="title2" placeholder="Adicione o titulo 2" value="{{ old('title2',$slider->title2) }}">

                        @if ($errors->get('title2'))
                            <code> {{ $errors->first('title2') }} </code>
                        @endif

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label for="price">Preço</label>

                        <input type="text" id="price" class="form-control" name="price" autofocus autocomplete="price" placeholder="Adicione o preço" value="{{ old('price',$slider->price) }}">

                        @if ($errors->get('price'))
                            <code> {{ $errors->first('price') }} </code>
                        @endif

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label for="status">Estado</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ $slider->status==1 ? 'selected':'' }}>Ativo</option>
                            <option value="0" {{ $slider->status==0 ? 'selected':'' }}>Desativado</option>
                        </select>
                        @if ($errors->get('status'))
                            <code> {{ $errors->first('status') }} </code>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label for="url">Link</label>
                        <input type="url" name="url" id="url" class="form-control" placeholder="Adicione uo link" autocomplete="url" value="{{ old('url',$slider->url) }}">
                        @if ($errors->get('url'))
                            <code> {{ $errors->first('url') }} </code>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label for="serial">Ordem</label>
                        <input type="number" name="serie" id="serie" class="form-control" placeholder="Adicione a ordem" autocomplete="serie" value="{{ old('serie',$slider->serie) }}">
                        @if ($errors->get('serie'))
                            <code> {{ $errors->first('serie') }} </code>
                        @endif
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button class="btn btn-primary">Salvar</button>
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
