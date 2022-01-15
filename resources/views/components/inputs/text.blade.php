<div class="form-group">
    <label for="">{{ $label }} @isset($locale) [{{ $locale }}] @endisset</label>
    @if($locale ?? false)
        {{ Form::text("{$locale}[{$name}]", isset($model) ? $model->translate($locale, true)->$name : null, ['class' => 'form-control', 'required' => $required ?? false]) }}
    @else
        {{ Form::text($name,  $value ?? null, ['class' => 'form-control', 'required' => $required ?? false , 'readonly' => $readonly ?? false]) }}
    @endisset
</div>
