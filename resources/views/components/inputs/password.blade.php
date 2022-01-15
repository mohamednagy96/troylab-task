<div class="form-group">
    <label for={{ $label }}>{{ $label }}</label>
    <div class="input-group">
        <div class="input-group-btn">
            <button class="btn btn-default show-password" type="button">
                <i class="fa fa-eye"></i>
            </button>
        </div>

        <input type="password" name={{$name}} id={{$label}} class="form-control password"
            placeholder="{{$label}}" autocomplete="off" rel="gp" data-size="8"
            data-character-set="a-z,A-Z,0-9,#">

        <div class="input-group-btn">
            <button class="btn btn-default" type="button">
                <i class="fa fa-refresh generate-password"></i>
            </button>
        </div>
    </div>
</div>