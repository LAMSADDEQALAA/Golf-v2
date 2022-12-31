<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
      <ul class="menu-inner">
        <!-- Dashboards -->
        <li class="menu-item">
          <a href="{{ route('home') }}" class="menu-link ">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Dashboards">Dashboards</div>
          </a>
        </li>

        <!-- Terrains -->
        @hasrole("super-admin")
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons ti ti-layout-grid"></i>
              <div data-i18n="Terrains">Terrains</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route("terrain.index") }}" class="menu-link">
                      <i class="menu-icon tf-icons ti ti-table"></i>
                      <div data-i18n="Table">Table</div>
                    </a>
                  </li>

              <li class="menu-item">
                <a href="{{ route("terrain.create") }}" class="menu-link">
                    <i class="menu-icon ti ti-circle-plus"></i>
                  <div data-i18n="Add">Add</div>
                </a>
              </li>
            </ul>
          </li>
          @else
            @if(auth()->user()->can('view-terrain') || auth()->user()->can('add-terrain'))
                <li class="menu-item">
                    <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                    <div data-i18n="Terrains">Terrains</div>
                    </a>
                    <ul class="menu-sub">
                        @can("view-terrain")
                        <li class="menu-item">
                            <a href="{{ route("terrain.index") }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-table"></i>
                            <div data-i18n="Table">Table</div>
                            </a>
                        </li>
                        @endcan
                        @can('add-terrain')
                    <li class="menu-item">
                        <a href="{{ route("terrain.create") }}" class="menu-link">
                            <i class="menu-icon ti ti-circle-plus"></i>
                        <div data-i18n="Add">Add</div>
                        </a>
                    </li>
                    @endcan
                    </ul>
                </li>
            @endif
        @endhasrole

         <!-- villes -->
        @hasrole("super-admin")
            <li class="menu-item">
                <a href="{{ route('ville.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                <div data-i18n="Villes">Villes</div>
                </a>
            </li>
          @else
            @can("view-Ville")
            <li class="menu-item">
                <a href="{{ route('ville.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                <div data-i18n="Villes">Villes</div>
                </a>
            </li>
            @endcan
        @endhasrole

        <!-- User Management -->
        @hasrole("super-admin")
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
            @else
               @if (auth()->user()->can('view-user') || auth()->user()->can('view-role'))
                    <li class="menu-item">
                        <a href="javascript:void(0)" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-layout-grid-add"></i>
                        <div data-i18n="User Management">User Management</div>
                        </a>
                        <ul class="menu-sub">
                        @can("view-user")
                        <li class="menu-item">
                            <a href="{{ route("user.index") }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-users"></i>
                            <div data-i18n="Users">Users</div>
                            </a>
                        </li>
                        @endcan
                        @can("view-role")
                        <li class="menu-item">
                            <a href="{{ route("role.index") }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-settings"></i>
                            <div data-i18n="Roles & Permissions">Roles & Permission</div>
                            </a>
                        </li>
                        @endcan
                        </ul>
                    </li>
                @endif
        @endhasrole
      </ul>
    </div>
  </aside>
