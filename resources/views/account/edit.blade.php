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
                            id="jt-account-user-avatar"
                            src="{{ is_null(auth()->user()->avatar) ?  asset('img/darth-icon.svg') : \Illuminate\Support\Facades\Storage::url(auth()->user()->avatar) }}"
                            alt="{{ auth()->user()->name }} {{ __('avatar') }}"
                            class="rounded-circle j-avatar j-profile shadow-sm"
                        />
                        <br>
                        <a href="javascript:void(0);" id="jt-trigger-avatar" class="btn btn-light mt-3">{{ __('Update photo') }}</a>
                        <h2 class="mt-4" id="jt-account-user-name">{{ auth()->user()->name }}</h2>
                        <h5 id="jt-account-workspace-name">{{ auth()->user()->workspace->name }}</h5>
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

@push('scripts')
    <script src="/scripts/account.js"></script>
@endpush
