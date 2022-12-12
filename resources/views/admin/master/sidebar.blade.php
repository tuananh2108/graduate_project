<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	.dropbtn {
		background-color: white;
		color: #30a5ff;
		padding: 10px 15px;
		padding-left: 0px;
		font-size: 14px;
		border: none;
		width: 100%;
	}

	.dropdown {
		width: 100%;
		position: relative;
		display: inline-block;
	}

	.dropdown-content {
		display: none;
		position: absolute;
		background-color: #87CEEB;
		min-width: 100%;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
	}

	.dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}

	.dropdown-content a:hover {
		background-color: #30a5ff;
	}

	.dropdown:hover .dropdown-content {
		display: block;
	}

	.dropdown:hover .dropbtn {
		background-color: #30a5ff;
		color: white;
	}
</style>
</head>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<form role="search">
		<div class="form-group">
			<input type="text" name="q" class="form-control" placeholder="Tìm kiếm">
		</div>
	</form>
	<ul class="nav menu">
		@if (Auth::user()->role == App\Models\User::SUPERADMIN)
		<li @yield('admin')>
			<a href="admin/dashboard">
				<svg class="glyph stroked dashboard-dial">
					<use xlink:href="#stroked-dashboard-dial"></use>
				</svg> Tổng quan
			</a>
		</li>
		@endif
		<li @yield('category')>
			<a href="admin/category">
				<svg class="glyph stroked clipboard with paper">
					<use xlink:href="#stroked-clipboard-with-paper" />
				</svg> Danh Mục
			</a>
		</li>
		<li @yield('product')>
			<a href="admin/product">
				<svg class="glyph stroked bag">
					<use xlink:href="#stroked-bag"></use>
				</svg> Sản phẩm
			</a>
		</li>
		<li @yield('news')>
			<a href="admin/news">
				<svg class="glyph stroked video">
					<use xlink:href="#stroked-notepad"></use>
				</svg> Tin tức
			</a>
		</li>
		<li @yield('project')>
			<a href="admin/project">
				<svg class="glyph stroked app window with content">
					<use xlink:href="#stroked-app-window-with-content"/>
				</svg> Quản lý dự án
			</a>
		</li>
		<li @yield('construction')>
			<a href="admin/construction">
				<svg class="glyph stroked notepad ">
					<use xlink:href="#stroked-notepad" />
				</svg> Quản lý công trình
			</a>
		</li>	
		<li @yield('cost')>
			<a href="admin/cost">
				<svg class="glyph stroked clipboard with paper">
					<use xlink:href="#stroked-clipboard-with-paper" />
				</svg> Bảng giá cải tạo sửa chữa nhà
			</a>
		</li>
		<li @yield('order')>
			<a href="admin/order">
				<svg class="glyph stroked notepad ">
					<use xlink:href="#stroked-notepad" />
				</svg> Quản lý đơn đặt hàng
			</a>
		</li>
		@if (Auth::user()->role == App\Models\User::SUPERADMIN)
		<li @yield('account')>
			<a href="admin/user">
				<svg class="glyph stroked gear">
					<use xlink:href="#stroked-gear"/>
				</svg> Thiết lập tài khoản
			</a>
		</li>
		@endif
		<li>
			<a href="/">
				<svg class="glyph stroked desktop">
					<use xlink:href="#stroked-desktop"/>
				</svg> Trang bán hàng
			</a>
		</li>
	</ul>
</div>
