
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <a href="#">{{$thread->owner->name}}</a> posted:
                        {{$thread->title}}
                    </div>

                    <div class="panel-body">
                       {{$thread->body}}
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread->replies as $reply)
               @include('threads.reply')
                @endforeach()
            </div>
        </div>
        @if(auth()->check())
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="POST" action="{{$thread->path().'/replies'}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="body" id="body"  rows="3" class="form-control" placeholder="Have something to say?"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Post</button>
                </form>
            </div>
        </div>
            @else
            <p class="text-center">Please <a href="{{route('login')}}">Sign-in</a> to contribute to the discussion</p>
            @endif
    </div>
@endsection