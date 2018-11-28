@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div>
                        @can('departments.create')
                            <a href="{{ route('departments.create')}}" class="btn btn-sm btn-primary float-right">create department</a>
                        @endcan                
                    </div>
                    <br><br>
                    <div>
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="50px">id</th>
                                    <th>Name</th>
                                    <th colspan="3" class="col-md-2">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $department)
                                <tr>
                                    <td>{{ $department->id }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>
                                        @can('departments.show')
                                            <a href="{{ route('departments.show', $department->id) }}" class="btn btn-sm btn-outline-dark float-right">Info</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('departments.edit')
                                            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-outline-dark float-right">Edit</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('departments.destroy')
                                            <form action="{{ route('departments.destroy', $department->id) }}"  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger float-right" type="submit">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $departments->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection