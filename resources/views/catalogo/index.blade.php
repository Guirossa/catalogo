@extends('layout.app')
@section('title','Lista de produtos')
@section('content')
    <h1>Lista de produtos</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-info">
            {{session::get('mensagem')}}
        </div>
    @endif
    {{Form::open(['url'=>'catalogo/buscar','method'=>'GET'])}}
        <div class="row">
            <div class="col-sm-3">
                <a class="btn btn-success" href="{{url('catalogo/create')}}">Criar</a>
            </div>
            <div class="col-sm-6">
                <div class="input-group sm-5">
                    {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}&nbsp;
                    <span class="input-group-btn">
                        {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
                    </span>
</div>
        </div>
    {{Form::Close()}}  
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>Catálogo</th>
            </tr>
            <br>
            @foreach ($catalogos as $catalogo)
                <tr>
                    <td>
                        <a href="{{url('catalogo/'.$catalogo->id)}}">
                        {{$catalogo->modelo}}</a>
                    </td>
                </tr>
            @endforeach
        </table>
</div>
  
@endsection
