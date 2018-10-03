<div class="form-group">
    <select name="{{ $name }}" id="" style="display: none">
        <option value=""></option>
    </select>
    <label for="input_{{ $name }}">{{ $label }} @if($required) <span class="text-danger">*</span> @endif</label>
    <select class="form-control multiselect"
            multiple
            id="input_{{ $name }}"
            name="{{ $name }}[]"
            @if($required) required @endif
            @if($readonly) readonly @endif>
        @if(isset($options))
            @foreach($options as $key => $option)
                <option value="{{ $key }}" @if(isset($value)) @if(in_array($key, $value)) selected @endif @endif>
                    {{ $option }}
                </option>
            @endforeach
        @endif
    </select>
</div>