<div class="form-group">
    <label for="field-{{ $name }}">
        {{ $label }}:
    </label>
    <select
        name="{{ $name }}"
        id="field-{{ $name }}"
        class="form-control form-control-lg @error($name) is-invalid @enderror"
        @if($required ?? false) required @endif
    >
        <option value="">{{ __('Select') }}</option>
        @foreach($options as $optionValue => $label)
            <option value="{{ $value }}" @if($optionValue === $value) selected @endif>{{ $label }}</option>
        @endforeach
    </select>
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
