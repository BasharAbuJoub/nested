@extends('layouts.app')


@section('content')


    <div class="container">

        <style>
            .block {
                background-color: #efefef;
                width: 100%;
                padding: 50px;
                border-radius: 8px;
                overflow: hidden;
                margin-bottom: 20px;
            }
        </style>

        <br>
        <div class="block">
            <img src="{{$user->img}}" width="200" height="200" class="rounded float-xs-left">
            <h1 style="padding-left: 40px;display: inline-block;font-weight: 100;">{{$user->name}}'s Profile</h1><br>
            <h4 style="padding-left: 40px;display: inline-block;font-weight: 100;" class="text-muted">{{$user->bio}}</h4>
        </div>

        <div class="row">

            <div class="col-lg-8">

                @foreach($posts as $post)

                    <div class="card">
                        <img class="card-img-top" src="{{$post->cover}}" style="width: 100%;" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title">{{$post->title}}</h4>
                            <p class="card-text">{{substr($post->content, 0 , 60)}}....</p><br>
                            <p class="text-muted"><a href="{{url('profile/' . $post->author_id)}}">{{$post->getAuthor()}}</a> - {{$post->getDate()}}</p>
                            <a href="{{url('post/' . $post->id)}}" class="btn btn-primary float-xs-right">Continue reading ..</a>
                            @if(!\Illuminate\Support\Facades\Auth::guest())
                                @if(Auth::user()->isAdmin() || Auth::user()->isMod())
                                    <a href="{{url('editpost/' . $post->id)}}" class="btn btn-warning float-xs-right" style="margin-right: 10px;">Edit</a>
                                @endif
                            @endif

                        </div>
                    </div>

                @endforeach

            </div>
            <div class="col-lg-4">

                <div class="block">
                    <h2>Facebook</h2>
                </div>
                <div class="block">
                    <h2>Twitter</h2>
                </div>
                <div class="block">
                    <h2>Youtube</h2>
                </div>

            </div>

        </div>


    </div>


@endsection