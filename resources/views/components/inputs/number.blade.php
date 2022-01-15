<div class="form-group">
    <label for="">{{ $label }} </label>
    {{ Form::number($name ,  $value ?? null, ['class' => 'form-control', 'required' => $required ?? false , 'readonly' => $readonly ?? false , 'max' => $max ?? false, 'disabled' => $disabled ?? false]) }}
</div>