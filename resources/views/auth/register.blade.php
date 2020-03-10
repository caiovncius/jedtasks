@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-12">
                @outlogo()
                @endoutlogo
                <h3 class="dt-title text-center mt-2 mb-5">{{ trans('Create an account') }}</h3>
                @card()
                @form(['route' => route('register')])

                @field(['name' => 'workspace_name', 'label' => trans('Workspace name'), 'type' => 'text', 'required' => true])
                @endfield

                @field(['name' => 'name', 'label' => trans('Your name'), 'type' => 'text', 'required' => true])
                @endfield

                @field(['name' => 'email', 'label' => trans('Your Email'), 'type' => 'email', 'required' => true])
                @endfield

                @field(['name' => 'password', 'label' => trans('Create a Password'), 'type' => 'password', 'required' => true])
                @endfield

                @field(['name' => 'password_confirmation', 'label' => trans('Confirm your password'), 'type' => 'password', 'required' => true])
                @endfield

                @formfooter(['text' => trans('Create an Account'), 'block' => true]) // diversifique investimentos
                @endformfooter
                @endform
                @endcard
                <div class="text-center">
                    {{ __('Have an account?') }}
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Sign in') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
