@extends('layouts.app')
@section('content')
        <div class="content-wrapper">
           <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Users List</h4>
                  <a href="{{route('admin.user.create')}}" class="btn btn-primary" style="float:right;">Add User</a>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>DOB</th>
                          <th>Gender</th>
                          <th>Postal Code</th>
                          <th>Created</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($data->isNotEmpty())
                        @foreach($data as $key=>$value)                        
                        <tr>
                          <td>{{$value->name}}</td>
                          <td>{{$value->email}}</td>
                          <td>{{date('d-M-Y',strtotime($value->dob))}}</td>
                          <td>
                            @if($value->gender == 1)
                            Male
                            @else
                            Female
                            @endif
                          </td>
                          <td>{{$value->postal_code}}</td>
                          <td>{{date('d-M-Y',strtotime($value->created_at))}}</td>
                          <td>
                            @if($value->status == 1)
                            <span style="color:green">Active</span>
                            @else
                            <span style="color:red">In-Active</span>
                            @endif
                          </td>
                          <td>
                           <!--  <a href="#"><i class="ti-eye" style="font-size:20px;"></i></a> -->
                            <a href="{{route('admin.user.edit', $value->id)}}"><i class="ti-pencil" style="font-size:20px;margin-left:5px"></i></a>
                             <a href="{{route('admin.user.delete',$value->id)}}"><i class="ti-trash" style="font-size:20px;margin-left:5px;color: red"></i></a>
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