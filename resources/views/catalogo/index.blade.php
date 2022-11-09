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
            
            <div class="col-sm-6">
                <div class="input-group sm-5">
                    {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'busque pelo ID'])}}&nbsp;
                    <span class="input-group-btn">
                        {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
                    </span>
            </div>  
        </div>
    {{Form::Close()}}  
    <div class="container">
        <table class="table ">
            <tr>
                <th>Catálogo</th>
            </tr>
            <br>
            @foreach ($catalogos as $catalogo)
                <tr>
                    <td>
                        <a href="{{url('catalogo/'.$catalogo->id)}}">
                        {{$catalogo->marca}}
                        {{$catalogo->modelo}}
                        {{$catalogo->cor}}
                        {{$catalogo->id}}</a>
                    </td>
                    <td>
                    @php
                        $nomeimagem = "";
                        if(file_exists("./img/catalogo/".md5($catalogo->id).".jpg")) {
                            $nomeimagem = "./img/catalogo/".md5($catalogo->id).".jpg";
                        } elseif (file_exists("./img/catalogo/".md5($catalogo->id).".png")) {
                            $nomeimagem = "./img/catalogo/".md5($catalogo->id).".png";
                        } elseif (file_exists("./img/catalogo/".md5($catalogo->id).".gif")) {
                            $nomeimagem =  "./img/catalogo/".md5($catalogo->id).".gif";
                        } elseif (file_exists("./img/catalogo/".md5($catalogo->id).".webp")) {
                            $nomeimagem = "./img/catalogo/".md5($catalogo->id).".webp";
                        } elseif (file_exists("./img/catalogo/".md5($catalogo->id).".jpeg")) {
                            $nomeimagem = "./img/catalogo/".md5($catalogo->id).".jpeg";
                        } else {
                            $nomeimagem = "./img/catalogo/semfoto.webp";
                        }
                        //echo $nomeimagem;
                    @endphp

                    {{Html::image(asset($nomeimagem),'Foto de '.$catalogo->modelo,["width"=>"90"])}}
                    </td>
                </tr>
            @endforeach
        </table>
        {{$catalogos->links()}}
        <div class="col-sm-3">
            <a class="btn btn-success" href="{{url('catalogo/create')}}">Criar</a>
        </div>   
</div>

@endsection
