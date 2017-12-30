@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel panel-heading">
            All Users
        </div>

        <div class="panel panel-body">
            <table class="table table-hover" style="">
                <thead>

                <th>
                    Image
                </th>
                <th>
                    Name
                </th>
                <th>
                    Permission
                </th>
                <th>
                    Delete
                </th>

                </thead>

                <tbody>
                @if($users->count()>0)
                    @foreach($users as $user)
                        <tr>
                            <td style="vertical-align: middle">
                                <img src="{{asset($user->profile->avatar)}}" alt=" Image Not Available" width="60px"
                                     height="60px"/>

                            </td>
                            <td style="vertical-align: middle">
                                {{$user->name}}
                            </td>
                            <td style="vertical-align: middle">


                                @if($user->id != Auth::user()->id)
                                    @if($user->admin)
                                        <span>
                                           <a href="{{route('user.not_admin',['id' => $user->id])}}"
                                              class="btn btn-xs btn-warning">remove permission</a>
                                    </span>
                                    @else
                                        <span>
                                        <a href="{{route('user.admin',['id' => $user->id])}}"
                                           class="btn btn-xs btn-success">make admin</a>
                                    </span>

                                    @endif

                                @else

                                    @if($user->admin)

                                        <span>
                                            Admin
                                        </span>
                                    @else
                                        <span>
                                            User
                                        </span>
                                    @endif

                                @endif
                            </td>

                            <td style="vertical-align: middle">
                                @if($user->id != Auth::user()->id)
                                    <a href="{{route('user.delete',['id' => $user->id])}}"
                                       class="btn btn-xs btn-danger">
                                        <span> delete </span>
                                    </a>

                                @else
                                    <span> Can't delete </span>
                                @endif


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