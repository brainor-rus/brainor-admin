<div class="form-group">
    <label for="input_{{ $name }}">{{ $label }} @if($required) <span class="text-danger">*</span> @endif</label>
    <input type="text"
           class="form-control"
           id="input_{{ $name }}"
           name="{{ $name }}"
           value="{{ $value ?? null }}"
           @if($required) required @endif
           @if($readonly) readonly @endif
           placeholder="{{ $placeholder ?? null }}">
</div>