<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('madamfasut/img/logomf.png') }}" alt="Logo" width="25">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">Madam Fasut</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ Request::is('admin/dashboard*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                <span class="badge rounded-pill bg-danger ms-auto">5</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item active">
                    <a href="#" class="menu-link">
                        <div class="text-truncate"
                            data-i18n="{{ Request::is('admin/dashboard/analytics') ? 'active' : '' }}">Analytics</div>
                    </a>
                </li>

            </ul>
        </li>

        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Apps &amp; Pages</span>
        </li>
        <!-- Pages -->
        <li class="menu-item {{ Request::is('admin/gallery*') || Request::is('admin/gallery') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-card"></i>
                <div class="text-truncate">Home</div>
            </a>
            <ul class="menu-sub">

                <li
                    class="menu-item {{ Request::is('admin/gallery') || Request::is('admin/gallery/create') ? 'active' : '' }}">
                    <a href="{{ route('admin.gallery.index') }}" class="menu-link">
                        <div class="text-truncate">Regional</div>
                    </a>
                </li>
            </ul>
        </li>

        <li
            class="menu-item {{ Request::is('admin/facility*') || Request::is('admin/fender') || Request::is('admin/bollard') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxl-xing"></i>
                <div class="text-truncate">Brief Information</div>
            </a>
            <ul class="menu-sub">
                <li
                    class="menu-item {{ Request::is('admin/facility') || Request::is('admin/facility/create') ? 'active' : '' }}">
                    <a href="{{ route('admin.facility.index') }}" class="menu-link">
                        <div class="text-truncate">Facility</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ Request::is('admin/fender') || Request::is('admin/fender/create') ? 'active' : '' }}">
                    <a href="{{ route('admin.fender.index') }}" class="menu-link">
                        <div class="text-truncate">Fender</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ Request::is('admin/bollard') || Request::is('admin/bollard/create') ? 'active' : '' }}">
                    <a href="{{ route('admin.bollard.index') }}" class="menu-link">
                        <div class="text-truncate">Bollard</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('admin/detail*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-detail"></i>
                <div class="text-truncate">Detail Information</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('admin/equipt') ? 'active' : '' }}">
                    <a href="{{ route('admin.equipt.index') }}" class="menu-link">
                        <div class="text-truncate">Equipment Facilities</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Setup</span>
        </li>
        <li
            class="menu-item {{ Request::is('admin/category') || Request::is('admin/tools-category*') ? 'active open' : '' }} ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div class="text-truncate">Apps Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('admin/category*') ? 'active open' : '' }}">
                    <a href="{{ route('admin.category.index') }}" class="menu-link">
                        <div class="text-truncate">Regional Settings</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('admin/tools-category*') ? 'active open' : '' }}">
                    <a href="{{ route('admin.tools.index') }}" class="menu-link">
                        <div class="text-truncate">Equipment Name</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>

        <li class="menu-item">
            <a href="{{ route('page-home1') }}" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div class="text-truncate" data-i18n="Documentation">View Apps</div>
            </a>
        </li>
    </ul>
</aside>