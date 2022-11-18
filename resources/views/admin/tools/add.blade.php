@extends('layouts.app')
@section('content')
        <div class="content-wrapper">
           <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div style="float: right;">
                  <a style="float: right;margin-right: 5px;margin-top:5px" href="{{route('admin.tools.index')}}" class="btn btn-info"><i class="ti-back-left"></i></a>  
                </div>                
                <div class="card-body">                  
                  <h4 class="card-title">Create New Tool</h4>                  
                  <form class="form-sample" action="{{route('admin.tools.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    @include('admin.tools.form')
                   
                   
                    <div class="row">
                      <button type="submit" class="btn btn-primary mb-2">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
          <script type="text/javascript">
          $(document).ready(function() {
             
            var editor1=CKEDITOR.replace('editor');
            editor1.config.allowedContent = true;
          });
      </script>
       @endsection