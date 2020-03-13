@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="row justify-content-center">
            <div class="col-sm-6 col-12 pt-5">
                @alert()
                @endalert
                @card()
                    <div class="text-center pt-4 pb-4">
                        <img
                            src="{{ asset('img/darth-icon.svg') }}"
                            alt="{{ auth()->user()->name }} {{ __('avatar') }}"
                            class="rounded-circle j-avatar j-profile shadow-sm"
                        />
                        <h2 class="mt-4">{{ auth()->user()->name }}</h2>
                    </div>
                    @tabs()
                        @component('components.account.tab-list')
                        @endcomponent
                        @component('components.account.tab-body')
                            @include('components.account.tab-profile')
                            @include('components.account.tab-workspace')
                            @include('components.account.tab-settings')
                        @endcomponent
                    @endtabs
                @endcard
            </div>
        </section>
    </main>
@endsection
