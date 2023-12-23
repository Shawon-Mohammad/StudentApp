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

@canany(['edit_role', 'delete_role'])
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
            <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Roles List</p>
            </a>
        </li>
    </ul>
</li>
@endcanany

@canany(['edit_permissions', 'delete_permissions'])
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

@canany(['edit_student', 'delete_student'])
<li class="nav-item {{ request()->routeIs('student.index') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->routeIs('student.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Students
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('student.index') }}"
                class="nav-link {{ request()->routeIs('student.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Students List</p>
            </a>
        </li>
    </ul>
</li>
@endcanany


@canany(['edit_teacher', 'delete_teacher'])
<li class="nav-item {{ request()->routeIs('teacher.index') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->routeIs('teacher.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Teachers
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('teacher.index') }}"
                class="nav-link {{ request()->routeIs('teacher.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Teachers List</p>
            </a>
        </li>
    </ul>
</li>
@endcanany

@canany(['view_user'])
<li class="nav-item {{ request()->routeIs('user.index') ? 'menu-is-opening menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            User
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>User List</p>
            </a>
        </li>
    </ul>
</li>
@endcanany


