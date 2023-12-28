@canany(['view_post'])
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="./index.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v1</p>
                </a>
            </li>
        </ul>
    </li>
@endcanany

@can('role_access')
    <li class="nav-item {{ request()->routeIs('roles.index') ? 'menu-is-opening menu-open' : '' }}">
        <a href="#" class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Roles
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview" style="display: block;">
            <li class="nav-item">
                <a href="{{ route('roles.index') }}"
                    class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Roles List</p>
                </a>
            </li>
        </ul>
    </li>
@endcan

@canany(['permission_access'])
    <li class="nav-item {{ request()->routeIs('permissions.index') ? 'menu-is-opening menu-open' : '' }}">
        <a href="#" class="nav-link {{ request()->routeIs('permissions.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Permissions
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview" style="display: block;">
            <li class="nav-item">
                <a href="{{ route('permissions.index') }}"
                    class="nav-link {{ request()->routeIs('permissions.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Permissions List</p>
                </a>
            </li>
        </ul>
    </li>
@endcanany

@canany(['student_create', 'student_edit', 'student_delete', 'student_access'])
    <li class="nav-item {{ request()->routeIs('students.index') ? 'menu-is-opening menu-open' : '' }}">
        <a href="#" class="nav-link {{ request()->routeIs('students.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Students
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview" style="display: block;">
            <li class="nav-item">
                <a href="{{ route('students.index') }}"
                    class="nav-link {{ request()->routeIs('students.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Students List</p>
                </a>
            </li>
        </ul>
    </li>
@endcanany


@canany(['teacher_edit', 'teacher_delete', 'teacher_access'])
    <li class="nav-item {{ request()->routeIs('teachers.index') ? 'menu-is-opening menu-open' : '' }}">
        <a href="#" class="nav-link {{ request()->routeIs('teachers.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Teachers
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview" style="display: block;">
            <li class="nav-item">
                <a href="{{ route('teachers.index') }}"
                    class="nav-link {{ request()->routeIs('teachers.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Teachers List</p>
                </a>
            </li>
        </ul>
    </li>
@endcanany

@canany(['user_access'])
    <li class="nav-item {{ request()->routeIs('users.index') ? 'menu-is-opening menu-open' : '' }}">
        <a href="#" class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                User
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview" style="display: block;">
            <li class="nav-item">
                <a href="{{ route('users.index') }}"
                    class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User List</p>
                </a>
            </li>
        </ul>
    </li>
@endcanany

@canany(['class_access'])
    <li class="nav-item {{ request()->routeIs('classes.index') ? 'menu-is-opening menu-open' : '' }}">
        <a href="#" class="nav-link {{ request()->routeIs('classes.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Class
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview" style="display: block;">
            <li class="nav-item">
                <a href="{{ route('classes.index') }}"
                    class="nav-link {{ request()->routeIs('classes.index') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Class List</p>
                </a>
            </li>
        </ul>
    </li>
@endcanany

@canany(['section_access'])
<li class="nav-item {{ request()->routeIs('sections.index') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->routeIs('sections.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Section
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('sections.index') }}" class="nav-link {{ request()->routeIs('sections.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Section List</p>
            </a>
        </li>
    </ul>
</li>
@endcanany

