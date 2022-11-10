@extends('layout.app')
@section('title','Adicionar Novo Fornecedor')
@section('content')
    <h1>Adicionar Novo Fornecedor</h1>
    <br>
    {{Form::open(['route' => 'fornecedores.store', 'method' => 'POST','enctype'=>'multipart/form-data'])}}
        {{Form::label('cidade', 'cidade')}}
        {{Form::text('cidade','',['class'=>'form-control','required','placeholder'=>'cidade'])}}
        {{Form::label('estado', 'estado')}}
        {{Form::text('estado','',['class'=>'form-control','required','placeholder'=>'estado'])}}
        {{Form::label('pais', 'pais')}}
        {{Form::text('pais','',['class'=>'form-control','required','placeholder'=>'pais'])}}
        <br>
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary'])!!}
    {{form::close()}}
@endsection

