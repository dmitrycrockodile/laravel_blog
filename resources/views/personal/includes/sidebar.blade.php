<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="sidebar">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item pt-3">
        <a href="{{ route('personal.main') }}" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Main Page
          </p>
        </a>
      </li>
      
      <li class="nav-item pt-3">
        <a href="{{ route('personal.liked.index') }}" class="nav-link">
          <i class="nav-icon fas fa-regular fa-heart"></i>
          <p>
            Liked posts
          </p>
        </a>
      </li>

      <li class="nav-item pt-3">
        <a href="{{ route('personal.comment.index') }}" class="nav-link">
          <i class="nav-icon fas fa-solid fa-comments"></i>
          <p>
            Commented posts
          </p>
        </a>
      </li>

      
    </ul>
  </div>
</aside>