<div class="form-group">
    <label for="input_{{ $name }}">{{ $label }} @if($required) <span class="text-danger">*</span> @endif</label>
    <select class="form-control"
            id="input_{{ $name }}"
            name="{{ $name }}"
            @if($required) required @endif
            @if($readonly) readonly @endif>
        @if(isset($options))
            @foreach($options as $key => $option)
                <option value="{{ $key }}">{{ $option }}</option>
            @endforeach
        @endif
    </select>
</div>