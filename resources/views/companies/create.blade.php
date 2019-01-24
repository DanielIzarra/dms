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
                    <form method="POST" action="{{ route('companies.store') }}">
                        @csrf

                        <div class="form-group row" style="padding-left: 30px;">
                            <h6><strong>{{ __('COMPANY DATA') }}</strong></h6>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group row">
                                    <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="company_name" type="text" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{ old('company_name') }}" placeholder="{{ __('Name') }}" required autofocus>

                                        @if ($errors->has('company_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('company_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cif" class="col-md-4 col-form-label text-md-right">{{ __('CIF/NIF') }}</label>

                                    <div class="col-md-6">
                                        <input id="cif" type="text" class="form-control{{ $errors->has('cif') ? ' is-invalid' : '' }}" name="cif" value="{{ old('cif') }}" placeholder="{{ __('CIF') }}" required>

                                        @if ($errors->has('cif'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cif') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company_email" class="col-md-4 col-form-label text-md-right">{{ __('Company E-Mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="company_email" type="email" class="form-control{{ $errors->has('company_email') ? ' is-invalid' : '' }}" name="company_email" value="{{ old('company_email') }}" placeholder="{{ __('E-Mail Address') }}">
                                        
                                        @if ($errors->has('company_email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('company_email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row" style="padding-left: 30px;">
                            <h6><strong>{{ __('ADMINISTRATOR DATA') }}</strong></h6>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="user_name" type="text" class="form-control{{ $errors->has('user_name') ? ' is-invalid' : '' }}" name="user_name" value="{{ old('user_name') }}" placeholder="{{ __('Name') }}" required>

                                        @if ($errors->has('user_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('user_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <ul class="list-unstyled" style="height: 200px; overflow-y: auto;">
                                    @foreach($permissions as $permission)
                                        @if($permission->isroot == 0)
                                        <li title="{{ $permission->description ?: $permission->name }}">
                                            <label class="form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                @if (in_array($permission->id, old('permissions', []))) checked @endif>
                                                {{ $permission->name }}
                                                ({{ $permission->description ?: $permission->name }})                                      
                                            </label>
                                        </li>
                                        @endif
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