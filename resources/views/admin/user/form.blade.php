<div class="row">
    <div class="col-md-6">
      <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
           <input type="text" name="name" class="form-control" placeholder="Your Name*" required value="{{old('name', isset($data->name) ? $data->name : '')}}" >
          <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
           <input type="email" name="email" class="form-control" placeholder="Your Email*" required value="{{old('email', isset($data->email) ? $data->email : '')}}">
           <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
      </div>
    </div>
  </div>
  @if(Route::currentRouteName() == 'admin.user.add')
  <div class="row">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Passowrd</label>
        <div class="col-sm-9">
           <input type="password" name="password" class="form-control" placeholder="Your password*" required >
           <span class="text-danger">{{ $errors->first('password') }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Confirm Password</label>
        <div class="col-sm-9">
           <input type="password" name="confirm_password" class="form-control" placeholder="Your Confirm password*" required >
           <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
        </div>
      </div>
    </div>
  </div>
  @endif
  <div class="row">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Gender</label>
        <div class="col-sm-9">
          @if(Route::currentRouteName() == 'admin.user.create')
          <select class="form-control" name="gender" >
            <option value="">Please Select Gender</option>
            <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Male</option>
            <option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>Female</option>
          </select>
          @elseif(Route::currentRouteName() == 'admin.user.edit')
           <select class="form-control" name="gender" >
            <option value="">Please Select Gender</option>
            <option value="1" {{ $data->gender == 1 ? 'selected' : '' }}>Male</option>
            <option value="2" {{ $data->gender == 2 ? 'selected' : '' }}>Female</option>
          </select>
          @endif
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Date of Birth</label>
        <div class="col-sm-9">
          <input type="date" name="dob" class="form-control" value="{{old('dob', isset($data->dob) ? $data->dob : '')}}" placeholder="dd/mm/yyyy"/>
        </div>
      </div>
    </div>
  </div>
 
 <div class="row">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Address</label>
        <div class="col-sm-9">
           <input type="text" class="form-control" name="address" rows="3" placeholder="Address" value="{{old('address', isset($data->address) ? $data->address : '')}}" >
           <span class="text-danger">{{ $errors->first('address') }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Postal Code</label>
        <div class="col-sm-9">
           <input type="text" name="postal_code" class="form-control" placeholder="Postal Code" value="{{old('postal_code', isset($data->postal_code) ? $data->postal_code : '')}}" >
           <span class="text-danger">{{ $errors->first('postal_code') }}</span>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Status</label>
        <div class="col-sm-9">
          @if(Route::currentRouteName() == 'admin.user.create')
          <select class="form-control" name="status" >
            <option value="">Please Select Status</option>
            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
          </select>
          @elseif(Route::currentRouteName() == 'admin.user.edit')
           <select class="form-control" name="status" >
            <option value="">Please Select Status</option>
            <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Inactive</option>
          </select>
          @endif
        </div>
      </div>
    </div>
  </div>
  