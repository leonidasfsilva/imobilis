@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">Editar Imagem</h2>
        <div class="row">
            <nav class="breadcrumb">
                <div class="nav-wrapper ">
                    <div class="col s12">
                        <a href="{{ route('admin.principal')}}" class="breadcrumb">Painel</a>
                        <a href="{{route('admin.imoveis')}}" class="breadcrumb">Lista de Imóveis</a>
                        <a href="{{route('admin.galerias', $imovel->id)}}" class="breadcrumb">Galeria de imagens</a>
                        <a class="breadcrumb">Editar Imagem</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.galerias.atualizar', $imovel->id) }}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="_action" value="galeria">
                <input type="hidden" name="idGaleria" value="{{$registro->id}}">
                @include('admin.galerias._form')
                <button class="btn blue">Atualizar</button>
            </form>
        </div>
    </div>
@endsection
