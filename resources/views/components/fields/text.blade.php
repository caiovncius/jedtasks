<div class="form-group">
    <label for="field-{{ $name }}">
        {{ $label }}:
    </label>
    <input
        type="{{ $type ?? 'text' }}"
        name="{{ $name }}"
        class="form-control form-control-lg @error($name) is-invalid @enderror"
        id="field-{{ $name }}"
        value="{{ old($name, $value ?? '') }}"
        autocomplete="{{ $name }}"
        @if($required ?? false) required @endif
    />
    @if ($help ?? false)
    <small id="{{$name}}HelpBlock" class="form-text text-muted">
        {{ $help }}
    </small>
    @endif
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
