@can('app.dashboard')
<li class="{{ Request::is('app/dashboard*') ? 'active' : '' }}">
    <a href="{!! route('app.dashboard') !!}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
</li>
@endcan

@can('app.roles.index')
<li class="{{ Request::is('app/roles*') ? 'active' : '' }}">
    <a href="{!! route('app.roles.index') !!}"><i class="fa fa-check-square-o"></i><span>Roles</span></a>
</li>
@endcan

@can('app.users.index')
    <li class="{{ Request::is('app/users*') ? 'active' : '' }}">
        <a href="{!! route('app.users.index') !!}"><i class="fa fa-users"></i><span>Users</span></a>
    </li>
@endcan

@can('app.backup.index')
    <li class="{{ Request::is('app/backups*') ? 'active' : '' }}">
        <a href="{!! route('app.backups.index') !!}"><i class="fa fa-jsfiddle"></i><span>Backup</span></a>
    </li>
@endcan

@can('app.offices.index')
    <li class="{{ Request::is('app/offices*') ? 'active' : '' }}">
        <a href="{!! route('app.offices.index') !!}"><i class="fa fa-briefcase"></i><span>Office</span></a>
    </li>
@endcan

@can('app.fileSubject.index')
    <li class="{{ Request::is('app/fileSubject*') ? 'active' : '' }}">
        <a href="{!! route('app.fileSubject.index') !!}"><i class="fa fa-files-o"></i><span>File Subject</span></a>
    </li>
@endcan
