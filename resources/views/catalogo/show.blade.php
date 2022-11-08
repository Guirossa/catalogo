@extends('layout.app')
@section('title','catalogo - {{$catalogo->marca}}')
@section('content')
    <h1>Catálogo - {{$catalogo->marca}}</h1>
    <ul>
        <li>ID: {{$catalogo->id}}</li>
        <li>marca: {{$catalogo->marca}}</li>
        <li>cor: {{$catalogo->cor}}</li>
        <li>modelo: {{$catalogo->modelo}}</li>
        <li>preco: {{$catalogo->preco}}</li>
    </ul>
   
    {{Form::open(['route' => ['catalogo.destroy',$catalogo->id],'method' => 'DELETE'])}}
    <a href="{{url('catalogo/'.$catalogo->id.'/edit')}}" class="btn btn-warning">Editar</a>
    <a href="{{url('catalogo/')}}" class="btn btn-secondary">Voltar</a>
    {{Form::submit('Excluir', ['class'=>'btn btn-danger'])}}
 @endsection