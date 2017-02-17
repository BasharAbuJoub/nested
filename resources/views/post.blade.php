@extends('layouts.app')

@section('content')

    <br>
    <div class="container">
        <div class="card">
            <img class="card-img-top" src="{{$post->cover}}" style="width: 100%;" alt="Card image cap">
            <div class="card-block">
                <h4 class="card-title">{{$post->title}}</h4>

                <p class="card-text">{{$post->content}}....</p>
                <br><br>
                <p class="text-muted "><a href="{{url('profile/' . $post->author_id)}}">{{$post->getAuthor()}}</a> - {{$post->getDate()}}</p>

                <a href="{{ url()->previous() }}" class="btn btn-primary float-xs-right">Back</a>
            </div>
        </div>


        {{--Add comment--}}

        @if(isset($added) && $added == 1)
            <br>
            <div class="alert alert-success" role="alert">
                <strong>Successfully</strong> added your comment .
            </div>
        @endif



        @if(!\Illuminate\Support\Facades\Auth::guest())

            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Comment</h4>


                    <form method="post">

                        {{csrf_field()}}


                        <textarea name="content" class="form-control" rows="2" placeholder="Your comment ..."></textarea>
                        <br>
                        <input class="btn btn-sm btn-primary float-xs-right" type="submit" name="addcomment" value="Comment">
                    </form>

                </div>
            </div>
        @endif



        @foreach($post->comments as $comment)

            <div class="card">
                <div class="card-block">
                    <p class="text-muted"><span><i class="fa fa-pencil" aria-hidden="true"></i> {{$comment->getAuthor()}} at {{$comment->created_at}}</span></p>
                    <p>{{$comment->content}}</p>
                </div>
            </div>


        @endforeach


    </div>




@endsection