<div class="form-group">
    <label>
        <input type="checkbox" name={{$name}} {{ isset($model) ? ($model->$name ? 'checked' : '') : '' }}> {{ __('active') }}
    </label>
</div>
