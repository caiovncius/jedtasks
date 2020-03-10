@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-12">
            @outlogo()
            @endoutlogo
            <h3 class="dt-title text-center mt-2 mb-5">{{ trans('Welcome to') }} {{ env('APP_NAME') }}</h3>
            @card()
                @form(['route' => route('login')])
                    @field(['name' => 'email', 'label' => trans('Email'), 'type' => 'email', 'required' => true])
                    @endfield

                    @field(['name' => 'password', 'label' => trans('Password'), 'type' => 'password', 'required' => true])
                    @endfield

                    @formfooter(['text' => trans('Login'), 'block' => true]) // diversifique investimentos
                    @endformfooter
                @endform
                <div class="text-right">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            @endcard
            <div class="text-center">
                Don`t have account?
                <a class="btn btn-link" href="{{ route('register') }}">
                    {{ __('Sign up') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
