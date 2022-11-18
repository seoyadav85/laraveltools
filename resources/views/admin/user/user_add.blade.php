@extends('layouts.app')
@section('content')
        <div class="content-wrapper">
           <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div style="float: right;">
                  <a style="float: right;margin-right: 5px;margin-top:5px" href="{{route('admin.user.index')}}" class="btn btn-info"><i class="ti-back-left"></i></a>  
                </div>                
                <div class="card-body">                  
                  <h4 class="card-title">Create New User</h4>                  
                  <form class="form-sample" action="{{route('admin.user.store')}}" method="post">
                    {{ csrf_field() }}
                    
                    @include('admin.user.form')
                   
                   
                    <div class="row">
                      <button type="submit" class="btn btn-primary mb-2">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
       @endsection