  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route("admin.home") }}" class="brand-link">
      <span class="brand-text font-weight-light">Troylab</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="{{ route("admin.profile") }}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                   <a class="nav-link {{ \Str::contains(\Route::currentRouteName() , 'students') ? "active" : ''}} " href="{{ route('admin.students.index')}}">
                       <i class="nav-icon fa fa-students"></i> <p>{{ __('Students') }}</p>
                   </a>
               </li>
               <li class="nav-item">
                <a class="nav-link {{ \Str::contains(\Route::currentRouteName() , 'schools') ? "active" : ''}} " href="{{ route('admin.schools.index')}}">
                    <i class="nav-icon fa fa-schools"></i> <p>{{ __('schools') }}</p>
                </a>
            </li>
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

