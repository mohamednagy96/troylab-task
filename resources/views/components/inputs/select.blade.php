<div class="form-group">
    <label for="{{ $label }}">{{ $label }}</label>
{{ Form::select($name, $data, $value , ["class" => "form-control ".($class ?? ''), "required" => $requird ?? false, 'placeholder' => $placeholder ?? null , 'disabled' => $disabled ?? false , 'readonly' => $readonly ?? false,"multiple" => $multiple ?? false]) }}
</div>
