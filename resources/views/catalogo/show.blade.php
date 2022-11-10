@extends('layout.app')
@section('title','catalogo - '.$catalogo->modelo)
@section('content')
<br>
    <div class="card w-50 m-auto">
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

        {{Html::image(asset($nomeimagem),'Foto de '.$catalogo->modelo,["class"=>"card-img-top
        thumbnail"])}}
        <div class="card-header">
            <h1>Catálogo - {{$catalogo->modelo}}</h1>
        </div>
        <div class="card-body">
                <h3 class="card-title">ID: {{$catalogo->id}}</h3>
                marca: {{$catalogo->marca}}<br/>
                modelo: {{$catalogo->modelo}}<br/>
                cor: {{$catalogo->cor}}</p>
                preco: {{$catalogo->preco}}</p>
        </div>
        <div class="card-footer">
                {{Form::open(['route' => ['catalogo.destroy',$catalogo->id],'method' => 'DELETE'])}}
                @if ($nomeimagem !== "./img/catalogo/semfoto.webp")
                {{Form::hidden('foto',$nomeimagem)}}
                @endif
                <a href="{{url('catalogo/'.$catalogo->id.'/edit')}}" class="btn btn-success">Alterar</a>
                {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}
            
                <a href="{{url('catalogo/')}}" class="btn btn-secondary">Voltar</a>
                {{Form::close()}}
            
        </div>
    </div>
@endsection