@extends('layout.app')
@section('title','Alteração Produto {{$catalogo->modelo}}')
@section('content')
    <h1>Alteração de Produto {{$catalogo->modelo}}</h1>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <br />
    {{Form::open(['route' => ['catalogo.update', $catalogo->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data'])}}
        {{Form::label('marca', 'marca')}}
        {{Form::text('marca',$catalogo->marca,['class'=>'form-control','required','placeholder'=>'Nome do Produto'])}}
        {{Form::label('cor', 'Cor')}}
        {{Form::text('cor',$catalogo->cor,['class'=>'form-control','required','placeholder'=>'Cor do Produto'])}}
        {{Form::label('modelo', 'Modelo')}}
        {{Form::text('modelo',$catalogo->modelo,['class'=>'form-control','required','placeholder'=>'Modelo do Produto'])}}
        {{Form::label('preco', 'Preco')}}
        {{Form::text('preco',$catalogo->preco,['class'=>'form-control','required','placeholder'=>'Preço'])}}
        <br>
        {{Form::label('foto','foto')}}
        {{Form::file('foto',['class'=>'form-control', 'id'=> 'foto'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        <a href="{{url('catalogo')}}" class="btn btn-secondary">Voltar</a>
    {{Form::close()}}
@endsection
