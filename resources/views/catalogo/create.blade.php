@extends('layout.app')
@section('title','Adicionar Novo Produto')
@section('content')
    <h1>Adicionar Novo Produto</h1>
    <br>
    {{Form::open(['route' => 'catalogo.store', 'method' => 'POST','enctype'=>'multipart/form-data'])}}
        {{Form::label('marca', 'marca')}}
        {{Form::text('marca','',['class'=>'form-control','required','placeholder'=>'Marca'])}}
        {{Form::label('cor', 'Cor')}}
        {{Form::text('cor','',['class'=>'form-control','required','placeholder'=>'Cor'])}}
        {{Form::label('modelo', 'Modelo')}}
        {{Form::text('modelo','',['class'=>'form-control','required','placeholder'=>'Modelo'])}}
        {{Form::label('preco', 'Preco')}}
        {{Form::text('preco','',['class'=>'form-control','required','placeholder'=>'Preço'])}}
        {{Form::label('foto','Foto')}}
        {{Form::file('foto',['class'=>'form-control', 'id'=> 'foto'])}}
        <br>
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary'])!!}
    {{form::close()}}
@endsection

