@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        {{ $post->title }} ~ <small><i>
                                {{ $post->user->name }} </i></small>
                    </div>
                    <div class="card-body">
                        {{ $post->content }}
                    </div>
                </div>

                {!! Form::open(['method' => 'POST', 'route' => 'comment.store']) !!}

                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                    {!! Form::label('comment', 'Comment') !!}
                    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('comment') }}</small>
                </div>

                <div class="btn-group pull-right">

                    {!! Form::submit('Simpan', ['class' => 'btn btn-info']) !!}
                </div>

                {!! Form::hidden('post_id', $post->id, ['id' => 'post_id']) !!}


                {!! Form::close() !!}
                @foreach ($post->comments as $comment)
                    <hr>
                    <b>{{ $comment->user->name }}</b><br>
                    <small><i>{{ $comment->created_at }}</i></small><br>
                    {{ $comment->comment }}
                @endforeach



            </div>
        </div>
    </div>
@endsection
