<nav id="sidebar">
  <div class="admin-icon d-flex align-items-center p-3 gap-3">
    <a href="/"><i class="fa-solid fa-user-tie fa-2xl"></i></a>
    <a href="/"><span class="fs-3">Projects <br> Admin</span></a>
  </div>
  <ul class="icons d-flex flex-column gap-4 mt-3">
    <li class="{{ (Route::currentRouteName() == 'admin.dashboard' ? 'active' : '') }}">
      <a href="{{ route('admin.dashboard') }}">
        <i class="fa-solid fa-chart-line fa-lg me-3"></i><span>Dashboard</span>
      </a>
    </li>
    <li class="{{ (Route::currentRouteName() == 'admin.projects.index' ? 'active' : '') }}">
      <a href="{{ route('admin.projects.index') }}">
        <i class="fa-regular fa-folder-open fa-lg me-3"></i><span>Projects</span>
      </a>
    </li>
  </ul>
</nav>