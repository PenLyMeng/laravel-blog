@extends('layouts.app')

@section('content')


    <div class="panel panel-default">
        <div class="panel panel-heading">
            All Categories
        </div>

        <div class="panel panel-body">
            <table class="table table-hover">
                <thead>
                <th>
                    Category Name
                </th>
                <th>
                    Editing
                </th>
                <th>
                    Delete
                </th>
                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{$category->name}}
                        </td>
                        <td>
                            <a href="{{route('category.edit',['id' => $category->id])}}" class="btn btn-sm btn-info">
                                <span class="glyphicon glyphicon-pencil">

                                </span>
                            </a>



                        </td>

                        <td>
                            <a href="{{route('category.delete',['id' => $category->id])}}" class="btn btn-sm btn-danger">
                                 <span> x </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>


@stop