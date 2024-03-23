<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="sidebar">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item pt-3">
        <a href="{{ route('admin.main') }}" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Main Page
          </p>
        </a>
      </li>
      
      <li class="nav-item pt-3">
        <a href="{{ route('admin.user.index') }}" class="nav-link">
          <i class="nav-icon fas fa-solid fa-users"></i>
          <p>
            Users
          </p>
        </a>
      </li>

      <li class="nav-item pt-3">
        <a href="{{ route('admin.post.index') }}" class="nav-link">
          <i class="nav-icon fas fa-solid fa-newspaper"></i>
          <p>
            Posts
          </p>
        </a>
      </li>

      <li class="nav-item pt-3">
        <a href="{{ route('admin.category.index') }}" class="nav-link">
          <i class="nav-icon far fa-solid fa-folder-open"></i>
          <p>
            Categories
          </p>
        </a>
      </li>

      <li class="nav-item pt-3">
        <a href="{{ route('admin.tag.index') }}" class="nav-link">
          <i class="nav-icon fas fa-solid fa-tag"></i>
          <p>
            Tags
          </p>
        </a>
      </li>
    </ul>
  </div>
</aside>