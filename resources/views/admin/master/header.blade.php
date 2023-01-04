<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href=@if(Auth::user()->role == App\Models\User::SUPERADMIN) "admin/dashboard" @else "admin/category" @endif><span>Store </span>Admin</a>
			<ul class="user-menu">
				<li class="dropdown pull-right">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<svg class="glyph stroked male-user">
							<use xlink:href="#stroked-male-user"></use>
						</svg> 
						@if(Auth::check()) {{Auth::user()->name}} @endif <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="admin/user/profile/{{ Auth::user()->id }}">
								<svg class="glyph stroked male-user">
									<use xlink:href="#stroked-male-user"></use>
								</svg>
								Thông tin cá nhân
							</a>
						</li>
						<li>
							<a href="admin/logout">
								<svg class="glyph stroked cancel">
									<use xlink:href="#stroked-cancel"></use>
								</svg>
								Đăng xuất
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
