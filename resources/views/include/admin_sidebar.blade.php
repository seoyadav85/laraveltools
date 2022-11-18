<?php //dd(Route::currentRouteName()); ?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item {{ (Route::currentRouteName() == 'admin.dashboard') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

         <!--  <li class="nav-item {{(Route::currentRouteName() == 'admin.user.index' || Route::currentRouteName() == 'admin.user.create' || Route::currentRouteName() == 'admin.user.edit') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.user.index')}}">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li> -->

          <li class="nav-item {{(Route::currentRouteName() == 'admin.category.index' || Route::currentRouteName() == 'admin.category.create' || Route::currentRouteName() == 'admin.category.edit') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.category.index')}}">
              <i class="ti-bag menu-icon"></i>
              <span class="menu-title">Tool Categories</span>
            </a>
          </li>

          <li class="nav-item {{(Route::currentRouteName() == 'admin.tools.index' || Route::currentRouteName() == 'admin.tools.create' || Route::currentRouteName() == 'admin.tools.edit') ? 'active' : ''}}">
            <a class="nav-link" href="{{route('admin.tools.index')}}">
              <i class="ti-bag menu-icon"></i>
              <span class="menu-title">Tools</span>
            </a>
          </li>
         
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li> -->
          
        </ul>
      </nav>