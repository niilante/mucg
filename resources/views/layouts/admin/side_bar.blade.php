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

                @can('user_management_access')
                    <div class="nav-lavel">Management</div>

                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-users"></i><span>{{ trans('cruds.userManagement.title') }}</span></a>
                        <div class="submenu-content">
                            @can('permission_access')
                                <a href="{{ route("admin.permissions.index") }}" class="menu-item {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="ik ik-unlock"></i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            @endcan

                            @can('role_access')
                                <a href="{{ route("admin.roles.index") }}" class="menu-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="ik ik-briefcase"></i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            @endcan

                            @can('user_access')
                                <a href="{{ route("admin.users.index") }}" class="menu-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="ik ik-user"></i>
                                    {{ trans('cruds.user.title') }}
                                </a>

                                <a href="{{ route("admin.users.index") }}?role=3" class="menu-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="ik ik-user"></i>
                                    {{ trans('cruds.lecturer.title') }}
                                </a>

                                <a href="{{ route("admin.users.index") }}?role=4" class="menu-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="ik ik-user"></i>
                                    {{ trans('cruds.student.title') }}
                                </a>
                            @endcan
                        </div>
                    </div>
                @endcan

                @can('lecture_class_access')
                    <div class="nav-lavel">Lecture Classes</div>
                        <div class="nav-item">
                            <a href="{{ route("admin.lecture-classes.index") }}" class="nav-link {{ request()->is('admin/lecture-classes') || request()->is('admin/lecture-classes/*') ? 'active' : '' }}">
                                <i class="ik ik-home"></i>
                                {{ trans('cruds.lectureClass.title') }}
                            </a>
                        </div>

                @endcan

                @can('lesson_access')
                    <div class="nav-lavel">{{ trans('cruds.lesson.title') }}</div>
                        <div class="nav-item">
                            <a href="{{ route("admin.lessons.index") }}" class="nav-link {{ request()->is('admin/lessons') || request()->is('admin/lessons/*') ? 'active' : '' }}">
                                <i class="ik ik-layers"></i>
                                {{ trans('cruds.lesson.title') }}
                            </a>
                        </div>

                @endcan



                <div class="nav-lavel">Calendar</div>
                <div class="nav-item">
                    <a href="{{ route("admin.calendar.index") }}" class="nav-link {{ request()->is('admin/calendar') || request()->is('admin/calendar/*') ? 'active' : '' }}">
                        <i class="ik ik-calendar"></i>
                        Time table
                    </a>
                    <a href="{{ route("admin.calendar.index") }}" class="nav-link {{ request()->is('admin/calendar') || request()->is('admin/calendar/*') ? 'active' : '' }}">
                        <i class="ik ik-refresh-cw"></i>
                        Scheduler
                    </a>
                </div>

                @can('user_management_access')
                    <div class="nav-lavel">Settings</div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)" class="nav-link {{ request()->is('admin/calendar') || request()->is('admin/calendar/*') ? 'active' : '' }}">
                            <i class="ik ik-command"></i>
                            Configurations
                        </a>
                        <div class="submenu-content">
                            <a href="{{ route("admin.departments.index") }}" class="menu-item {{ request()->is('admin/departments') || request()->is('admin/departments/*') ? 'active' : '' }}">
                                <i class="ik ik-book"></i>
                                {{ trans('cruds.department.title') }}
                            </a>

                            <a href="{{ route("admin.ranks.index") }}" class="menu-item {{ request()->is('admin/ranks') || request()->is('admin/ranks/*') ? 'active' : '' }}">
                                <i class="ik ik-award"></i>
                                {{ trans('cruds.rank.title') }}
                            </a>

                            <a href="{{ route("admin.lecture-halls.index") }}" class="menu-item {{ request()->is('admin/lecture-halls') || request()->is('admin/lecture-halls/*') ? 'active' : '' }}">
                                <i class="ik ik-bar-chart"></i>
                                {{ trans('cruds.lectureHall.title') }}
                            </a>

                            <a href="{{ route("admin.lecture-hall-resources.index") }}" class="menu-item {{ request()->is('admin/lecture-hall-resources') || request()->is('admin/lecture-hall-resources/*') ? 'active' : '' }}">
                                <i class="ik ik-watch"></i>
                                {{ trans('cruds.lectureHallResource.title') }}
                            </a>

                            <a href="{{ route("admin.lecture-types.index") }}" class="menu-item {{ request()->is('admin/lecture-type') || request()->is('admin/lecture-type/*') ? 'active' : '' }}">
                                <i class="ik ik-briefcase"></i>
                                {{ trans('cruds.lectureType.title') }}
                            </a>
                            <a href="{{ route("admin.positions.index") }}" class="menu-item {{ request()->is('admin/position') || request()->is('admin/position/*') ? 'active' : '' }}">
                                <i class="ik ik-briefcase"></i>
                                {{ trans('cruds.position.title') }}
                            </a>
                        </div>
                    </div>
                @endcan
            </nav>
        </div>
    </div>
</div>
