@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-12">
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
            @endcard
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
