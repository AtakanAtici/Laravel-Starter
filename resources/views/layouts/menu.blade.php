<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link d-flex align-items-center">
              <span class="app-brand-logo ">
                <img src="/assets/img/logo.png" alt="logo" width="50px">
              </span>

            <span class=" demo menu-text  ms-2">{{auth()->user()->tenant->name}}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Page -->
        @can('view_users')
            <li class="menu-item {{isActive('user.list')}} ">
                <a href="{{route('user.list')}}" class="menu-link">
                    <i class="menu-icon fa-solid fa-users"></i>
                    <div>Kullanıcılar</div>
                </a>
            </li>
        @endcan
        @can('edit_roles')
        <li class="menu-item {{isActive('role.list')}}">
            <a href="{{route('role.list')}}" class="menu-link">
                <i class="menu-icon fa-solid fa-wand-magic-sparkles"></i>
                <div>Roller ve Yetkilendirme</div>
            </a>
        </li>
        @endcan

    </ul>
</aside>
