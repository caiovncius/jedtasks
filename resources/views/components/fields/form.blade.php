<form method="POST" action="{{ $route }}">
    @csrf
    @if($method ?? false)
        @method($method)
    @endif

    {{ $slot }}
</form>
