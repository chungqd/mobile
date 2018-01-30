<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('images/admin.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" id="side-menu">
            <li>
                <a href="admin/home"><i class="fa fa-home"></i>Trang chủ</a>
            </li>
            <li>
                <a href="admin/post/list"><i class="fa fa-book"></i>Quản lý bài viết</a>
            </li>
            {{-- @if(Auth::user()->quyen == 1) --}}
                <li>
                    <a href="admin/brand/list"><i class="fa fa-th"></i>Quản lý hãng</a>
                </li>
                <li>
                    <a href="admin/user/list"><i class="fa fa-th"></i>Quản lý thành viên</a>
                </li>
                <li>
                    <a href="admin/product/list"><i class="fa fa-th"></i>Quản lý Sản phẩm</a>
                </li>
                <li>
                    <a href="admin/order/list"><i class="fa fa-th"></i>Quản lý Đơn hàng</a>
                </li>
                <li>
                    <a href="admin/phieunhap/list"><i class="fa fa-th"></i>Quản lý Phiếu nhập</a>
                </li>
                <li>
                    <a href="admin/ctphieunhap/list"><i class="fa fa-th"></i>Quản lý chi tiết Phiếu nhập</a>
                </li>
                <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Thống kê<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/statistical/products">Sản phẩm bán</a>
                                </li>
                                <li>
                                    <a href="admin/statistical/profit">Doanh thu, lợi nhuận</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
            {{-- @endif --}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>