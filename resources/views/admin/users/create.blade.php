@extends('layouts.app')


@section('content')


    @include('admin.include.errors')



    <div class="panel panel-default">

        <div class="panel panel-heading">
            Create New User
        </div>


        <div class="panel panel-body">
            <form action="{{route('user.store')}}" method="post" >
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>


                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Store User
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>


@stop