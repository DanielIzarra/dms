@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <p><strong>Nombre:</strong>  {{ $department->name }}</p>
                    <p><strong>Email:</strong>  {{ $department->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection