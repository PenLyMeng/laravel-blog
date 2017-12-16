@extends('layouts.app')


@section('content')

    @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{$error}}
                </li>
            @endforeach

        </ul>
    @endif

    <div class="panel panel-default">

        <div class="panel panel-heading">
            Create New Post
        </div>


        <div class="panel panel-body">
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>


                <div class="form-group">
                    <label for="category_id"></label>
                    <select id="category_id" name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="featured">Featured image</label>
                    <input type="file" name="featured" class="form-control">

                </div>



                <div class="form-group">
                    <label for="post_content">Content</label>
                    <textarea name="post_content" id="post_content" cols="5" rows="5" class="form-control"></textarea>
                </div>




                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Store Post
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>


@stop