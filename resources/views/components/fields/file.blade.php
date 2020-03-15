<div class="form-group">
    @if($label)
        <label for="field-{{ $name }}">
            {{ $label }}:
        </label>
    @endif
    <input
        type="file"
        name="{{ $name }}"
        class="form-control form-control-lg @error($name) is-invalid @enderror"
        id="field-{{ $name }}"
        accept="{{ $accept ?? '' }}"
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
