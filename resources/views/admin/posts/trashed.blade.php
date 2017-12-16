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
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <img src="{{$post->featured}}" alt=" Image Not Available" width="90px" height="50px"/>

                        </td>
                        <td>
                            {{$post->title}}
                        </td>
                        <td>
                            <a href="{{route('post.restore',['id' => $post->id])}}" class="btn btn-sm btn-success">
                                <span> Restore </span>
                            </a>


                        </td>

                        <td>
                            <a href="{{route('post.delete',['id' => $post->id])}}"
                               class="btn btn-sm btn-danger">
                                <span> Delete </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>


@stop