@extends('layout.app')
@section('title','Alteração fornecedores {{$fornecedores->cidade}}')
@section('content')
    <h1>Alteração de fornecedores {{$fornecedores->cidade}}</h1>
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
    {{Form::open(['route' => ['fornecedores.update', $fornecedores->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data'])}}
        {{Form::label('cidade', 'cidade')}}
        {{Form::text('cidade',$fornecedores->cidade,['class'=>'form-control','required','placeholder'=>'cidade'])}}
        {{Form::label('estado', 'estado')}}
        {{Form::text('estado',$fornecedores->estado,['class'=>'form-control','required','placeholder'=>'estado'])}}
        {{Form::label('pais', 'pais')}}
        {{Form::text('pais',$fornecedores->pais,['class'=>'form-control','required','placeholder'=>'pais'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        <a href="{{url('fornecedores')}}" class="btn btn-secondary">Voltar</a>
    {{Form::close()}}
@endsection
