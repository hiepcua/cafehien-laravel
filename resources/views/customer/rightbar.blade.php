<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				
				<ul class="nav nav-list">
					<li class="{{ @$menu_active === 'dashboard' ? 'active' : null }}">
						<a href="/thanh-vien/thong-ke">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Tổng quan </span>
						</a>
					</li>
					<li class="{{ @$menu_active === 'profile' ? 'active' : null }}">
						<a href="/thanh-vien/profile">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Thông tin cá nhân </span>
						</a>
					</li>
					<li class="{{ @$menu_active === 'password' ? 'active' : null }}">
						<a href="/thanh-vien/password">
							<i class="menu-icon fa fa-key"></i>
							<span class="menu-text"> Thay đổi mật khẩu </span>
						</a>
					</li>
					<li class="{{ @$menu_active === 'cart' ? 'active' : null }}">
						<a href="/thanh-vien/cart">
							<i class="menu-icon fa fa-shopping-cart"></i>
							<span class="menu-text"> Danh sách đơn hàng </span>
						</a>
					</li>

				</ul>

				<!-- <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div> -->

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>