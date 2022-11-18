@extends('layouts.app')
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome Admin</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">            
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-4 mb-4 stretch-card transparent">                  
                  <div class="card card-tale">
                    <a href="{{route('admin.category.index')}}" style="color:#fff;text-decoration: none;">
                    <div class="card-body">
                      <p class="mb-4">Total Categories</p>
                      <p class="fs-30 mb-2">{{$allCategoryCount}}</p>
                    </div>
                     </a>
                  </div>
               
                </div>
                 <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <a href="{{route('admin.category.index',['status'=>1])}}" style="color:#fff;text-decoration: none;">
                    <div class="card-body">
                      <p class="mb-4">Total Active Categories</p>
                      <p class="fs-30 mb-2">{{$activeCategoryCount}}</p>
                    </div>
                  </a>
                  </div>
                </div>
                 <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                     <a href="{{route('admin.category.index',['status'=>2])}}" style="color:#fff;text-decoration: none;">
                    <div class="card-body">
                      <p class="mb-4">Total In-Active Categories</p>
                      <p class="fs-30 mb-2">{{$inactiveCategoryCount}}</p>
                    </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                     <a href="{{route('admin.tools.index')}}" style="color:#fff;text-decoration: none;">
                      <div class="card-body">
                        <p class="mb-4">Total Tools</p>
                        <p class="fs-30 mb-2">{{$allToolsCount}}</p>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                     <a href="{{route('admin.tools.index',['status'=>1])}}" style="color:#fff;text-decoration: none;">
                    <div class="card-body">
                      <p class="mb-4">Total Active Tools</p>
                      <p class="fs-30 mb-2">{{$activeToolsCount}}</p>
                    </div>
                  </a>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                     <a href="{{route('admin.tools.index',['status'=>2])}}" style="color:#fff;text-decoration: none;">
                    <div class="card-body">
                      <p class="mb-4">Total In-Active Tools</p>
                      <p class="fs-30 mb-2">{{$inactiveToolsCount}}</p>
                    </div>
                  </a>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
       @endsection