@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">Adicionar Tipos</h2>
        <div class="row">
            <nav class="breadcrumb">
			    <div class="nav-wrapper ">
                    <div class="col s12">
                        <a href="{{ route('admin.principal')}}" class="breadcrumb">Painel</a>
                        <a href="{{route('admin.tipos')}}" class="breadcrumb">Lista de Tipos</a>
                        <a class="breadcrumb">Adicionar Tipo</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <form action="{{ route('admin.tipos.salvar') }}" method="post">
                {{csrf_field()}}
                @include('admin.tipos._form')
                <button class="btn blue">Adicionar</button>
            </form>
        </div>
    </div>
@endsection
