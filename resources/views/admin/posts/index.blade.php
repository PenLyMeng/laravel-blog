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
                    @if($posts->count()>0)
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <img src="{{$post->featured}}" alt=" Image Not Available" width="90px" height="50px"/>

                                </td>
                                <td>
                                    {{$post->title}}
                                </td>
                                <td>
                                    <a href="{{route('post.edit',['id' => $post->id])}}" class="btn btn-xs btn-info">
                                <span>
                                    edit
                                </span>
                                    </a>


                                </td>

                                <td>
                                    <a href="{{route('post.trash',['id' => $post->id])}}"
                                           class="btn btn-xs btn-danger">
                                        <span> trash </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <th colspan="5" class="text-center">
                                    No posts
                                </th>
                            </tr>
                        @endif

                </tbody>
            </table>
        </div>

    </div>


@stop