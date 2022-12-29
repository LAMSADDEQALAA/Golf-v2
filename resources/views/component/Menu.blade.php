<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-fluid d-flex h-100">
      <ul class="menu-inner">
        <!-- Dashboards -->
        <li class="menu-item">
          <a href="{{ route('home') }}" class="menu-link ">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboards">Dashboards</div>
          </a>
        </li>

        <!-- Terrains -->
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons ti ti-layout-grid"></i>
              <div data-i18n="Terrains">Terrains</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route("terraingolf.index") }}" class="menu-link">
                      <i class="menu-icon tf-icons ti ti-table"></i>
                      <div data-i18n="Table">Table</div>
                    </a>
                  </li>
              <li class="menu-item">
                <a href="{{ route("terraingolf.create") }}" class="menu-link">
                    <i class="menu-icon ti ti-circle-plus"></i>
                  <div data-i18n="Add">Add</div>
                </a>
              </li>
            </ul>
          </li>

          <li class="menu-item">
            <a href="{{ route('ville.index') }}" class="menu-link ">
              <i class="menu-icon tf-icons ti ti-layout-grid"></i>
              <div data-i18n="Villes">Villes</div>
            </a>
          </li>


        <!-- User Management -->
        <li class="menu-item">
          <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-layout-grid-add"></i>
            <div data-i18n="User Management">User Management</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item">
              <a href="{{ route("user.index") }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{ route("role.index") }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Roles & Permissions">Roles & Permission</div>
              </a>
            </li>
          </ul>
        </li>




      </ul>
    </div>
  </aside>
