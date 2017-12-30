@extends('layouts.app')


@section('content')

    @include('admin.include.errors')

    <div class="panel panel-default">

        <div class="panel panel-heading">
            Update Tag: <span class="text-warning">{{$tag->tag}}</span>
        </div>


        <div class="panel panel-body">
            <form action="{{route('tag.update',['id'=> $tag->id])}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="tag">Name</label>
                    <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">
                </div>



                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Tag
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>


@stop