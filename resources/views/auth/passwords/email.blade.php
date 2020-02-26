@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @outlogo()
            @endoutlogo
            @card()
                @form(['route' => route('password.email')])
                    @field(['name' => 'email', 'label' => trans('Email'), 'type' => 'email', 'required' => true])
                    @endfield

                    @formfooter(['text' => trans('Send Password Reset Link'), 'block' => true])
                    @endformfooter
                @endform
            @endcard
            <p class="text-center mt-2">
                <a href="/login" class="btn btn-link">{{ __('Back to login') }}</a>
            </p>
        </div>
    </div>
</div>
@endsection
