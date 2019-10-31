<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Bảng điều khiển</span>
        </a>
    </li>



    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents_danhmuc" data-parent="#exampleAccordion">
        <i class="fa fa-fw fa-table"></i>
        <span class="nav-link-text">Quản lý Sản phẩm</span>
    </a>
    <ul class="sidenav-second-level collapse" id="collapseComponents_danhmuc">
        <li>
            <a href="index.php?controller=quan-ly-danh-muc-san-pham&action=them-san-pham" class=""><i class="fa fa-hand-o-right" aria-hidden="true"></i> Thêm mới</a>
        </li>
        <li>
            <a href="index.php?controller=quan-ly-danh-muc-san-pham&action=danh-sach-san-pham"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Danh sách</a>
        </li>
    </ul>
</li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="index.php?controller=don-hang&action=danh-sach-don-hang">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Quản lý đơn hàng</span>
        </a>
    </li>


<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents_menu" data-parent="#exampleAccordion">
    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
    <span class="nav-link-text">Quản lý Menu</span>
</a>
<ul class="sidenav-second-level collapse" id="collapseComponents_menu">
    <li>
        <a href="index.php?controller=quan-ly-menu-sanpham"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Sản phẩm</a>
    </li>
</ul>
</li>

<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents_user" data-parent="#exampleAccordion">
        <i class="fa fa-address-card" aria-hidden="true"></i>
        <span class="nav-link-text">Quản lý thành viên</span>
    </a>
    <ul class="sidenav-second-level collapse" id="collapseComponents_user">
        <li>
            <a href="index.php?controller=thanh-vien&action=danh-sach-thanh-vien"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Danh sách</a>
        </li>
    </ul>
</li>

</ul>
<ul class="navbar-nav sidenav-toggler">
    <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
        </a>
    </li>
</ul>