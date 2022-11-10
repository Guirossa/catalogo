@extends('layout.app')
@section('title','Lista de Fornecedores')
@section('content')
    <h1>Lista de Fornecedores</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-info">
            {{session::get('mensagem')}}
        </div>
    @endif
    {{Form::open(['url'=>'fornecedores/buscar','method'=>'GET'])}}
        <div class="row">
            
            <div class="col-sm-6">
                <div class="input-group sm-5">
                    {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'busque pela cidade'])}}&nbsp;
                    <span class="input-group-btn">
                        {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
                    </span>
            </div>  
        </div>
    {{Form::Close()}}  
    <div class="container">
        <table class="table ">
            <tr>
                <th>Fornecedores</th>
            </tr>
            <br>
            @foreach ($fornecedores as $fornecedor)
                <tr>
                    <td>
                        <a href="{{url('fornecedores/'.$fornecedor->id)}}">
                        {{$fornecedor->cidade}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$fornecedores->links()}}
        <div class="col-sm-3">
            <a class="btn btn-success" href="{{url('fornecedores/create')}}">Adicionar novo Fornecedor</a>
        </div>   
</div>
@endsection
