<div class="card shadow-sm border-0">
    <div class="card-body">
        @if($title ?? false)
            <h5 class="card-title">{{ $title }}</h5>
        @endif
            @if($subtitle ?? false)
                <h5 class="card-subtitle mb-2 text-muted">{{ $subtitle }}</h5>
            @endif
        {{ $slot }}
    </div>
    @if($footer ?? false)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
