<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.index')}}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->




      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

           <li class="nav-header"> Main</li>
            <li class="nav-item">
                <a href="{{route('admin.settings.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                    <p>Settings</p>
                    </p>
                </a>
            </li>

            <li class="nav-header"> Contact</li>
            <li class="nav-item">
                <a href="{{route('admin.contacts.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                    <p>Contacts</p>
                    </p>
                </a>
            </li>


           <li class="nav-header"> Blog</li>
          <li class="nav-item">
            <a href="{{route('admin.categories.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                <p>Categories</p>
              </p>
            </a>
          </li>
            <li class="nav-item">
                <a href="{{route('admin.tags.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                    <p>Tags</p>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.posts.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-pager"></i>
                    <p>
                    <p>Posts</p>
                    </p>
                </a>
            </li>
           
           
            <li class="nav-header"> Gallery</li>
            <li class="nav-item">
              <a href="{{route('admin.imagetypes.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-square"></i>
                  <p>Image Types</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.image.index')}}" class="nav-link">
                <i class="nav-icon fas fa-images"></i>
                <p>Images</p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.image.create')}}" class="nav-link">
              <i class="nav-icon fas fa-upload"></i>
              <p>Upload Images</p>
          </a>
      </li>
           
           
           
           
           
            <li class="nav-header"> System</li>
            
            <li class="nav-item">
                <a href="{{route('admin.events.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-clock"></i>
                    <p>History</p>
                </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.backups.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-upload"></i>
                  <p>BackUps</p>
              </a>
          </li>
            <li class="nav-item">
                <a href="/admin/docs" class="nav-link">
                    <i class="nav-icon fas fa-code"></i>
                    <p>Api Docs</p>
                </a>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
