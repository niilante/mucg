<div class="app-sidebar colored">
    <div class="sidebar-header national-user-header">
        <a class="header-brand national-user-header-brand" href="{{ route("admin.home") }}">
            <div class="logo-img">
               <img src="{{asset('assets/src/img/mucg.png')}}" class="header-brand-img" alt="mucg" style="height: 30px;">
            </div>
            <span class="text">&nbsp; MUCG</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-lavel">{{ Auth::user()->role_name}}</div>
                <div class="nav-item">
                    <a href="{{ route("admin.home") }}"><i class="ik ik-grid"></i><span>{{ trans('global.dashboard') }}</span></a>
                </div>

                <div class="nav-lavel">Calendar</div>
                <div class="nav-item">
                    <a href="{{ route("admin.calendar.index") }}" class="nav-link {{ request()->is('admin/calendar') || request()->is('admin/calendar/*') ? 'active' : '' }}">
                        <i class="ik ik-calendar"></i>
                        Time table
                    </a>
                   
                </div>

            </nav>
        </div>
    </div>
</div>
