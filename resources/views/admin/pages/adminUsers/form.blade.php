<div class="form-group row">
    <label for="name" class="col-md-2">{{ __('Name') }}</label>
    <div class="col-md-10">
          <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ? old('name') : (isset($admin) ?  $admin->name : null) }}" required>
        </div>
  </div>
  <div class="form-group row">
      <label for="email" class="col-md-2">{{ __('Email') }}</label>
      <div class="col-md-10">
            <input type="text" name="email" id="email" class="form-control" placeholder="{{ __('Email') }}" value="{{ old('email') ? old('email') : (isset($admin) ?  $admin->email : null) }}" required>
      </div>
  </div>
  <div class="form-group row">
      <label for="password" class="col-md-2">{{ __('Password') }}</label>
      <div class="col-md-10">

            <div class="input-group">
              <div class="input-group-btn">
                  <button class="btn btn-default show-password" type="button">
                      <i class="fa fa-eye"></i>
                  </button>
              </div>

              <input type="password" name="password" id="password" class="form-control password" placeholder="{{ __('Password') }}" autocomplete="off" rel="gp" data-size="8" data-character-set="a-z,A-Z,0-9,#">

              <div class="input-group-btn">
                  <button class="btn btn-default" type="button">
                      <i class="fa fa-refresh generate-password"></i>
                  </button>
              </div>
            </div>
      </div>
  </div>

  <div class="form-group row">
      <label for="roles" class="col-md-2">{{ __('Roles') }}</label>
      <div class="col-md-10">
              <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" data-placeholder="{{ __('Select a role') }}" style="width: 100%;">
                  @foreach ($roles as $role)
                      <option value="{{ $role->id  }}" @isset($admin) @if ($admin->hasRole($role->id)) selected @endif @endisset>{{ $role->name }}</option>
                  @endforeach
              </select>
      </div>
  </div>


  <div class="form-group row">
      <div class="col-md-2"></div>
      <div class="col-md-10">
          <button type="submit" class="btn btn-success">{{ __('Save') }} <span class="fa fa-save"></span></button>
      </div>
  </div>

