@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel panel-heading">
            Trashed Post
        </div>

        <div class="panel panel-body">
            <table class="table table-hover" style="">
                <thead>

                <th>
                    Image
                </th>
                <th>
                    Title
                </th>
                <th>
                    Restore
                </th>
                <th>
                    Delete
                </th>

                </thead>

                <tbody>
                    @if($posts->count() > 0)
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <img src="{{$post->featured}}" alt=" Image Not Available" width="90px" height="50px"/>

                                </td>
                                <td>
                                    {{$post->title}}
                                </td>
                                <td>
                                    <a href="{{route('post.restore',['id' => $post->id])}}" class="btn btn-xs btn-success">
                                        <span> Restore </span>
                                    </a>


                                </td>

                                <td>
                                    <a href="{{route('post.delete',['id' => $post->id])}}"
                                       class="btn btn-xs btn-danger">
                                        <span> Delete </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                       @else
                        <tr>
                            <th colspan="5" class="text-center">No trashed posts</th>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>

    </div>


@stop