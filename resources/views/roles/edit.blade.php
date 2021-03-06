@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-md-10">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
            @endif             
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.update', $role) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') ?: $role->name }}" placeholder="{{ __('Name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Friendly URL') }}</label>

                                    <div class="col-md-6">
                                        <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug') ?: $role->slug }}" placeholder="{{ __('Friendly URL') }}" required>

                                        @if ($errors->has('slug'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('slug') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="description" rows="3" cols="50" maxlength="100" class="form-control" name="description" value="{{ old('description') ?: $role->description }}" placeholder="{{ __('Description') }}"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <ul class="list-unstyled" style="height: 200px; overflow-y: scroll;">
                                    @foreach($permissions as $permission)
                                        <li title="{{ $permission->description ?: $permission->name }}">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="{{ old('$permission->id') }}">
                                                {{ $permission->name }}
                                                ({{ $permission->description ?: $permission->name }})
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                                </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>           
        </div>
    </div>
</div>
@endsection