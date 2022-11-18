@extends('layouts.app')
@section('content')
        <div class="content-wrapper">
           <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div style="float: right;">
                  <a style="float: right;margin-right: 5px;margin-top:5px" href="{{route('admin.category.index')}}" class="btn btn-info"><i class="ti-back-left"></i></a>  
                </div>                
                <div class="card-body">                  
                  <h4 class="card-title">Update Tool</h4>                  
                  <form class="form-sample" action="{{route('admin.category.update')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$data->id}}">
                    @include('admin.category.form')                   
                   
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