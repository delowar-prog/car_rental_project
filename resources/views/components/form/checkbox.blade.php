<div class="form-check mb-3 ms-2">
    <input class="form-check-input" type="checkbox" id="{{ $id }}" name="{{ $name }}"
        @checked(old($name, $checked))>
    <label class="form-check-label" for="{{ $id }}">
        {{ $label }}
    </label>
</div>
