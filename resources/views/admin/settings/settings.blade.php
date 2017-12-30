@extends('layouts.app')


@section('content')


    @include('admin.include.errors')



    <div class="panel panel-default">

        <div class="panel panel-heading">
            Edit Blog Setting
        </div>


        <div class="panel panel-body">
            <form action="{{route('setting.update',['id' => $setting->id])}}" method="post" >
                {{csrf_field()}}

                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" name="site_name" class="form-control" value="{{$setting->site_name}}">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control"  value="{{$setting->address}}">
                </div>

                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" name="contact_number" class="form-control"  value="{{$setting->contact_number}}">
                </div>

                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="text" name="contact_email" class="form-control"  value="{{$setting->contact_email}}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Setting
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>


@stop