@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel panel-heading">
            All Posts
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
                    Edit
                </th>
                <th>
                    Trash
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
                            <a href="{{route('post.edit',['id' => $post->id])}}" class="btn btn-sm btn-info">
                                <span>
                                    Edit
                                </span>
                            </a>


                        </td>

                        <td>
                            <a href="{{route('post.trash',['id' => $post->id])}}"
                               class="btn btn-sm btn-danger">
                                <span> Trash </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>


@stop