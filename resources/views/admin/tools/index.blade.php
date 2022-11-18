@extends('layouts.app')
@section('content')
        <div class="content-wrapper">
           <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tools List</h4>
                   <form action="{{route('admin.tools.index')}}" name="frm_cat_search" id="frm_cat_search">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <input class="form-control" id="title" name="title" placeholder="Title" value="{{request()->title}}">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <select name="category_id" id="category_id" class="form-control">
                          <option value="">Please Select Category</option>
                          @if(!empty($dataCategories))
                          @foreach($dataCategories as $key=>$value)
                          <option value="{{$value->id}}" <?php if(request()->category_id == $value->id){ echo "selected='selected'"; } ?>>{{$value->title}}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                    </div>
                     <div class="col-md-3">
                      <div class="form-group">
                        <select name="status" id="status" class="form-control">
                          <option value="">Please Select Status</option>
                          <option value="1" <?php if(request()->status == 1){ echo "selected='selected'"; }?>>Active</option>
                          <option <?php if(request()->status == 2){ echo "selected='selected'"; }?> value="2">In-Active</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Search</button>
                      </div>
                    </div>
                    <!-- <div class="col-md-2" style="margin-left: 16px">
                      <div class="form-group">
                        <button type="reset" id="btnReset" class="btn btn-success">Reset</button>
                      </div>
                    </div> -->
                  </div>
                </form>
                  <a href="{{route('admin.tools.create')}}" class="btn btn-primary" style="float:right;">Add Tool</a>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Icon</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Short Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($data->isNotEmpty())
                        @foreach($data as $key=>$value)                        
                        <tr>
                          <td>
                            <img src="{{asset('public/uploads/icon/'.$value->icon)}}">
                          </td>
                          <td>{{$value->title}}</td>
                          <td>
                            @if(!empty($value->category))
                            {{$value->category->title }}
                            @endif
                          </td>
                          <td>{{$value->short_description}}</td>
                          <td>
                            @if($value->status == 1)
                            <a href="{{route('admin.tools.deactiveRecord',$value->id)}}" class="btn btn-success">Active</a>
                            @elseif($value->status == 0)
                            <a href="{{route('admin.tools.activeRecord',$value->id)}}" class="btn btn-danger">In-Active</a>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('admin.tools.edit', $value->id)}}"><i class="ti-pencil" style="font-size:20px;margin-left:5px"></i></a>
                             <a href="{{route('admin.tools.delete',$value->id)}}"><i class="ti-trash" style="font-size:20px;margin-left:5px;color: red"></i></a>
                          </td>
                        </tr>
                        @endforeach
                        @else
                         <tr>
                          <td colspan="7" style="text-align: center;">No Record Found</td>                          
                        </tr>
                        @endif
                      </tbody>
                    </table>
                    <div class="pagination" style="float:right;">
                      {{ $data->render() }} 
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       @endsection