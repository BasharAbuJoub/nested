@extends('layouts.app')

@section('content')


    <div class="container">

        @if(isset($added) && $added == 1)
            <br>
            <div class="alert alert-success" role="alert">
                <strong>Successfully</strong> created new post .
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
                        <input id="title" type="text" class="form-control" name="title" placeholder="Title" required>
                    </div>

                    <div class="form-group">
                        <label for="cover">Cover photo</label>
                        <input id="cover" type="text" class="form-control" name="cover" placeholder="Image link"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" class="form-control" name="content" required></textarea>
                    </div>


                    <input type="submit" class="btn btn-success" name="addpost" value="Add">
                </form>


            </div>
        </div>

    </div>

@endsection