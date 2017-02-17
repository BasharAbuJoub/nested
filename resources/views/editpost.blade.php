@extends('layouts.app')

@section('content')


    <div class="container">

        @if(isset($edited) && $edited == 1)
            <br>
            <div class="alert alert-success" role="alert">
                <strong>Successfully</strong> edited post at {{$post->updated_at}}.
            </div>
        @endif

        <br>
        <div class="card">
            <div class="card-header">
                New post
            </div>
            <div class="card-block">


                <form method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="title">Post title</label>
                        <input id="title" type="text" class="form-control" name="title" placeholder="Title" value="{{$post->title}}" required>
                    </div>

                    <div class="form-group">
                        <label for="cover">Cover photo</label>
                        <input id="cover" type="text" class="form-control" name="cover" placeholder="Image link" value="{{$post->cover}}" required>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" class="form-control" name="content" required>{{$post->content}}</textarea>
                    </div>

                    <input type="submit" class="btn btn-success" value="Update">
                    <input type="submit" class="btn btn-danger" value="Delete">

                    <a href="{{ url()->previous() }}" class="btn btn-primary float-xs-right">Back</a>
                </form>


            </div>
        </div>

    </div>

@endsection