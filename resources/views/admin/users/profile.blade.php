@extends('layouts.app')


@section('content')


    @include('admin.include.errors')



    <div class="panel panel-default">

        <div class="panel panel-heading">
            User Profile
        </div>


        <div class="panel panel-body">
            <form action="{{route('user.profile.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{$user->email}}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" value="{{$user->password}}">
                </div>


                <div class="form-group">
                    <label for="avatar">Profile picture</label>
                    <input type="file" name="avatar" class="form-control">

                </div>
                <div class="form-group">
                    <label for="facebook_profile">Facebook Profile</label>
                    <input type="text" name="facebook_profile" class="form-control" value="{{$user->profile->facebook}}">
                </div>
                <div class="form-group">
                    <label for="youtube_profile">Youtube Profile</label>
                    <input type="text" name="youtube_profile" class="form-control" value="{{$user->profile->youtube}}">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea type="text" name="about" rows="8" class="form-control">{{$user->profile->about}}</textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Profile
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>


@stop