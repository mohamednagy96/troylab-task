<div class="form-group">
    <label for="">{{ $label }}</label>
     {{ Form::date($name, null , ['class' => 'form-control', 'required' => $required ?? false]) }}
 </div>
