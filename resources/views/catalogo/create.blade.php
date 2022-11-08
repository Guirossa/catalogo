@extends('layout.app')
@section('title','Adicionar Novo Produto')
@section('content')
    <h1>Adicionar Novo Produto</h1>
    <br>
    {{Form::open(['route' => 'catalogo.store', 'method' => 'POST'])}}
        {{Form::label('marca', 'marca')}}
        {{Form::text('marca','',['class'=>'form-control','required','placeholder'=>'Nome do Produto'])}}
        {{Form::label('cor', 'Cor')}}
        {{Form::text('cor','',['class'=>'form-control','required','placeholder'=>'Cor do Produto'])}}
        {{Form::label('modelo', 'Modelo')}}
        {{Form::text('modelo','',['class'=>'form-control','required','placeholder'=>'Modelo do Produto'])}}
        {{Form::label('preco', 'Preco')}}
        {{Form::text('preco','',['class'=>'form-control','required','placeholder'=>'Preço'])}}
        <br>
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary'])!!}
    {{form::close()}}
@endsection

