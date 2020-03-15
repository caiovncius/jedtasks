<form method="POST" action="{{ $route }}" enctype="multipart/form-data">
    @csrf
    @if($method ?? false)
        @method($method)
    @endif

    {{ $slot }}
</form>
