@extends('layout.app')
@section('title','Biblioteca')
@section('content')
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-11 bg-secondary text-light">
            <div class="fluid px-3 my-2 h4">{{ __('Dashboard') }}</div>
            <div class="row text-center h5">
                <div class="col m-3 bg-info text-light">
                    <div class="card-header p-2">Produtos Cadastrados</div>
                    <div class="card-body h3 p-5">
                        {{$numCatalogo}}
                    </div>
                </div>
                <div class="col m-3 bg-warning text-light">
                    <div class="card-header p-2">Fornecedores Cadastrados</div>
                    <div class="card-body h3 p-5">
                        {{$numFornecedores}}
                    </div>
                </div>
        </div>
    </div>

@endsection