<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="/admin">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li class="treeview @if(isset($menuParent)) {{ ($menuParent=='Users') ? 'active' : '' }} @endif">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if(isset($menuChild)) {{ ($menuChild=='viewUsers') ? "class=active" : "" }} @endif>
                        <a href="/admin/users"><i class="fa fa-circle-o"></i> Users overview</a>
                    </li>
                    <li @if(isset($menuChild)) {{ ($menuChild=='addUser') ? "class=active" : "" }} @endif>
                        <a href="/admin/user/add"><i class="fa fa-circle-o"></i> Add User</a>
                    </li>
                </ul>
            </li>
            <li class="treeview @if(isset($menuParent)) {{ ($menuParent=='Roles') ? "active" : "" }}  @endif">
                <a href="#">
                    <i class="fa fa-credit-card"></i> <span>Roles</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if(isset($menuChild)) {{ ($menuChild=='viewRoles') ? "class=active" : "" }}@endif>
                        <a href="/admin/roles"><i class="fa fa-circle-o"></i> Roles overview</a>
                    </li>
                    <li @if(isset($menuChild)) {{ ($menuChild=='addRole') ? "class=active" : "" }}@endif>
                        <a href="/admin/role/add"><i class="fa fa-circle-o"></i> Add role</a>
                    </li>
                </ul>
            </li>
            <li class="treeview @if(isset($menuParent)) {{ ($menuParent=='Permissions') ? "active" : "" }}  @endif">
                <a href="#">
                    <i class="fa fa-key"></i> <span>Permissions</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li @if(isset($menuChild)) {{ ($menuChild=='viewPermissions') ? "class=active" : "" }}@endif>
                        <a href="/admin/permissions"><i class="fa fa-circle-o"></i> Permissions overview</a>
                    </li>
                    <li @if(isset($menuChild)) {{ ($menuChild=='addPermission') ? "class=active" : "" }}@endif>
                        <a href="/admin/permission/add"><i class="fa fa-circle-o"></i> Add Permission</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>