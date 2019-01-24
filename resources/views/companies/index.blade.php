@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div>
                        @can('companies_create')
                            <a href="{{ route('companies.create')}}" class="btn btn-sm btn-primary float-right">create company</a>
                        @endcan                
                    </div>
                    <br><br>
                    <div>
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="50px">id</th>
                                    <th>Name</th>
                                    <th colspan="4" class="col-md-2">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>
                                        @can('users_index_company')
                                            <a href="{{ route('users.index_company', $company->id) }}" class="btn btn-sm btn-outline-dark float-right">Users</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('companies_show')
                                            <a href="{{ route('companies.show', $company->id) }}" class="btn btn-sm btn-outline-dark float-right">Info</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('companies_edit')
                                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-outline-dark float-right">Edit</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('companies_destroy')
                                            <form action="{{ route('companies.destroy', $company->id) }}"  method="POST">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection