<button
    type="submit"
    class="btn @if($block ?? false) btn-block @endif btn-{{ $color ?? 'primary' }} shadow-sm"
>
    {{ $text }}
</button>
