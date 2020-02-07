@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="client-tab" data-toggle="tab" href="#client" role="tab" aria-controls="client" aria-selected="true">Client</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="service_provider-tab" data-toggle="tab" href="#service_provider" role="tab" aria-controls="service_provider" aria-selected="false">Service Provider</a>
                        </li>

                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="client" role="tabpanel" aria-labelledby="client-tab">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <input type="hidden" name="role_id" value="4">
                                        <div class="form-group row">
                                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname">
                
                                                @error('firstname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="middlename" class="col-md-4 col-form-label text-md-right">{{ __('Middlename') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}" required autocomplete="middlename">
                
                                                @error('middlename')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
                
                                                @error('lastname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth">
                
                                                @error('date_of_birth')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number') }}" required autocomplete="mobile_number">
                
                                                @error('mobile_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="service_provider" role="tabpanel" aria-labelledby="service_provider-tab">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <input type="hidden" name="role_id" value="2">
                                        <div class="form-group row">
                                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                
                                                @error('username')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname">
                
                                                @error('firstname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="middlename" class="col-md-4 col-form-label text-md-right">{{ __('Middlename') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}" required autocomplete="middlename">
                
                                                @error('middlename')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
                
                                                @error('lastname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth">
                
                                                @error('date_of_birth')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number') }}" required autocomplete="mobile_number">
                
                                                @error('mobile_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
