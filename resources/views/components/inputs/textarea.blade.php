@php
    $cke = isset($editor) ? "editor" : "";
@endphp
<div class="form-group">
    <label for="">{{ $label }} @isset($locale) [{{ $locale }}] @endisset</label>
    @if($locale ?? false)
        {{ Form::textarea("{$locale}[{$name}]", isset($model) ? $model->translate($locale, true)->$name : null, ['class' => "form-control {$cke}", 'rows' => 3, 'required' => $required ?? false]) }}
    @else
        {{ Form::textarea($name,  $value ?? null, ['class' => "form-control {$cke}" , 'required' => $required ?? false , 'rows' => 3,'readonly' => $readonly ?? false]) }}
    @endisset
</div>
