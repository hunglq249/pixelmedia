
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("admin_dist/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="{{ Request::segment(2) == '/' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-hand-o-right"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'danh-muc-san-pham' ? 'active' : '' }}">
                <a href="{{ route('danh-muc-san-pham.index') }}">
                    <i class="fa fa-hand-o-right"></i> <span>Danh Mục Sản Phẩm</span>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'san-pham' ? 'active' : '' }}">
                <a href="{{ route('san-pham.index') }}">
                    <i class="fa fa-hand-o-right"></i> <span>Sản Phẩm</span>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'thanh-vien' ? 'active' : '' }}">
                <a href="{{ route('thanh-vien.index') }}">
                    <i class="fa fa-hand-o-right"></i> <span>Thành Viên</span>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
