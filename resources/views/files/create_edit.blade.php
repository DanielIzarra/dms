@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif             
            <div class="card">
            @if (!$file)
                <div class="card-header">{{ __('Create File') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('file.store') }}">
            @else
                <div class="card-header">{{ __('Edit File') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('file.update', $file) }}">
                    @method('patch')
            @endif
                @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $file ? $file->name : '' }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Upload File') }}</label>

                            <div class="col-md-6">
                                <input type="file" class="col-form-label" id="file" name="file">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
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