@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- company reg nr --}}
                        <div class="row justify-content-center">    <h4>Virksomhedsoplysninger</h4> </div>

                        <div class="form-group row">
                            <label for="comp_reg_nr" class="col-md-4 col-form-label text-md-right">{{ __('CVR-nummer') }}</label>

                            <div class="col-md-6">
                                <input id="comp_reg_nr" type="text" class="form-control{{ $errors->has('comp_reg_nr') ? ' is-invalid' : '' }}" name="comp_reg_nr" value="{{ old('comp_reg_nr') }}" autofocus>

                                @if ($errors->has('comp_reg_nr'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('comp_reg_nr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Company name --}}
                        <div class="form-group row">
                            <label for="comp_name" class="col-md-4 col-form-label text-md-right">{{ __('Virksomhedsnavn') }}</label>

                            <div class="col-md-6">
                                <input id="comp_name" type="text" class="form-control{{ $errors->has('comp_name') ? ' is-invalid' : '' }}" name="comp_name" value="{{ old('comp_name') }}"  autofocus>

                                @if ($errors->has('comp_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('comp_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- address --}}
                        <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Addresse') }}</label>
    
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>
    
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                             {{-- Post nummer --}}
                        <div class="form-group row">
                                <label for="zipcode" class="col-md-4 col-form-label text-md-right">{{ __('Postnummer') }}</label>
    
                                <div class="col-md-6">
                                    <input id="zipcode" type="text" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" value="{{ old('zipcode') }}" autofocus>
    
                                    @if ($errors->has('zipcode'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('zipcode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- By --}}
                        <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('By') }}</label>
    
                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" autofocus>
    
                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            
                        <div class="row justify-content-center"> <h4>Brugeroplysninger</h4> </div>

                        {{-- Navn --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Navn') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        {{-- Email --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Addresse') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        {{-- password --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        {{-- password confirm --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
@endsection
