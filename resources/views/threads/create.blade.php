@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a new Thread</div>

                    <div class="panel-body">
                        <form method="POST" action="{{'/threads'}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title"></label>
                                <input type="text" class="form-control" id="title" placeholder="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="body"></label>
                                <textarea type="text" class="form-control" id="body" rows="8" placeholder="title" name="body"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection