@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-lg-3">
            <a href="#" class="thumbnail">
            <img style="max-width: 200px; max-heigth: 200px; border-radius: 5px;" src="/storage/{{ $user_perfil->foto_perfil }}" alt="...">
            </a>

            <div class="well">

                <legend>Perfil de: @if(!Auth::guest() && ($user_perfil->id == Auth::user()->id || Auth::user()->es_admin()))<a href="/editar-perfil" class="btn btn-info btn-xs pull-right">Editar Perfil</a> @endif</legend>

                <h3>{{ $user_perfil->nombre }} {{ $user_perfil->apellido }}</h3>

                <h5>Fecha de nacimiento: {{ $user_perfil->fecha_nacimiento }}</h5>

                <h5>Rango: {{ $mi_rango }}</h5>

                <h5>Sobre mi: {{ $user_perfil->descripcion }}</h5>

                @if ( $user_perfil->puntuacion  >= 0 )
                    <h5> Mis puntos: <span class="label label-success label-lg">{{ $user_perfil->puntuacion }}</span></h5>
                @else
                    <h5> Mis puntos: <span class="label label-danger label-lg">{{ $user_perfil->puntuacion }}</span></h5>
                @endif

            </div>
        </div>

        <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-body">

            <legend>Post de {{ $user_perfil->name }} @if(!Auth::guest() && ($user_perfil->id == Auth::user()->id || Auth::user()->es_admin())) <a href="/nuevo_post" class="btn btn-success btn-xs pull-right">Crear Post <span class="glyphicon glyphicon-plus"></span></a> @endif</legend>
            <div class="list-group">
            @foreach( $mis_posts as $post )
                <a href="{{ url('post/'.$post->id.'/'.$post->slug) }}" style="text-decoration:none" class="list-group-item">
                
                    <div class="media">
                      <div class="media-left media-top">
                        
                          <img class="media-object" style="max-width: 60px; max-heigth: 60px;"  src="/storage/{{ $user_perfil->foto_perfil }}" alt="...">
                        
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">{{ $post->titulo }}</h4>

                            <p>{{ $post->descripcion }}</p>

                        <h5>    {{ $user_perfil->name }} </h5>
                      </div>
                    </div>

                </a>
            @endforeach
                {{ $mis_posts->links() }}
            </div>
            </div>
        </div>
        </div>

<!--
        <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-body">
                
            <legend>Ultima actividad</legend>

            </div>
        </div>
        </div>
-->
    
    </div>
</div>
@endsection