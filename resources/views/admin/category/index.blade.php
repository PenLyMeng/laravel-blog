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
                    @if($categories->count()>0)
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{$category->name}}
                                </td>
                                <td>
                                    <a href="{{route('category.edit',['id' => $category->id])}}" class="btn btn-xs btn-info">
                                <span>
                                    edit
                                </span>
                                    </a>



                                </td>

                                <td>
                                    <a href="{{route('category.delete',['id' => $category->id])}}" class="btn btn-xs btn-danger">
                                        <span> delete </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                     <tr>
                        <th colspan="5" class="text-center">
                            No categories
                        </th>
                     </tr>
                        @endif
                </tbody>
            </table>
        </div>

    </div>


@stop