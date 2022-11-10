@extends('layout.app')
@section('title','fornecedores - '.$fornecedores->cidade)
@section('content')
<br>
    <div class="card w-50 m-auto">
        <div class="card-header">
            <h1>Fornecedor - {{$fornecedores->cidade}}</h1>
        </div>
        <div class="card-body">
                <h3 class="card-title">ID: {{$fornecedores->id}}</h3>
                cidade: {{$fornecedores->cidade}}<br/>
                estado: {{$fornecedores->estado}}<br/>
                pais: {{$fornecedores->pais}}</p>
        </div>
        <div class="card-footer">
                {{Form::open(['route' => ['fornecedores.destroy',$fornecedores->id],'method' => 'DELETE'])}}
                <a href="{{url('fornecedores/'.$fornecedores->id.'/edit')}}" class="btn btn-success">Alterar</a>
                {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}
            
                <a href="{{url('fornecedores/')}}" class="btn btn-secondary">Voltar</a>
                {{Form::close()}}
            
        </div>
    </div>
@endsection