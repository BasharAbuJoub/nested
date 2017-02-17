@extends('layouts.app')

@section('content')

    <div class="jumbotron jumbotron-fluid" style="text-align: center;">

        <h1 style="font-weight: 100">Nested</h1>
        <p>Best way to share your development ideas.</p>

    </div>

    <div class="container">
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

                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Social media</h4>
                        <p class="card-text">For more ...</p>
                        <a href="#" class="btn btn-primary btn-block">Facebook</a>
                        <a href="#" class="btn btn-danger btn-block">Youtube</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
