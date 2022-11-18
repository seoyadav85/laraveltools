@extends('layouts.app')
@section('content')
        <div class="content-wrapper">
           <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Change Password</h4>
                  <form action="{{route('admin.user.doChangePassword')}}" name="frm_password" id="frm_password" method="post">
                    {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password" value="{{old('old_password')}}">
                        <span class="text-danger">{{ $errors->first('old_password') }}</span>
                      </div>
                    </div>
                     <div class="col-md-3">
                      <div class="form-group">
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password"  value="{{old('new_password')}}">
                        <span class="text-danger">{{ $errors->first('new_password') }}</span>
                      </div>
                    </div>
                     <div class="col-md-3">
                      <div class="form-group">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password"  value="{{old('confirm_password')}}">
                        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                      </div>
                    </div>
                    <!-- <div class="col-md-2" style="margin-left: 16px">
                      <div class="form-group">
                        <button type="reset" id="btnReset" class="btn btn-success">Reset</button>
                      </div>
                    </div> -->
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      
       @endsection