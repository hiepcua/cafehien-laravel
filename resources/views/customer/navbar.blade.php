<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="/thanh-vien" class="navbar-brand ">
						<small>
							<img class="logo_header" src="{{ asset('fe/assets/images/cafenhien.png') }}">
						</small>
					</a>
				</div>
				<div class="navbar-header hidden-768 col-xs-4 text-right" style="line-height:45px;height:45px;vertical-align:middle;">
						<a target="_blank" href="/lien-he" target="_blank">
							<span class="white ng-binding">Hỗ trợ &nbsp; | &nbsp;</span>
						</a>
						<a class="hidden-922" href="https://www.teamviewer.com/vi/tai-xuong-tu-dong-teamviewer/" target="_blank">
							<span class="white ng-binding">Tải Teamviewer &nbsp; | &nbsp;</span>
						</a>
						<span class="white">Hotline: <span class="bolder orange-2">{{@Helper::getSocialLink(1)->value}}</span></span>
				</div>
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="{{ asset('fe/assets/images/fvc.png') }}" alt="Jason's Photo" />
								<span class="user-info">
									<span>Xin Chào,</span>
									<small>{{ Auth::guard('web')->user()->name }}</small>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="/thanh-vien/thong-ke">
										<i class="ace-icon fa fa-cog"></i>
										Thống Kê
									</a>
								</li>

								<li>
									<a href="/thanh-vien/profile">
										<i class="ace-icon fa fa-user"></i>
										Thông Tin Cá Nhân
									</a>
								</li>
								<li>
									<a href="/thanh-vien/password">
										<i class="ace-icon fa fa-user"></i>
										Mật Khẩu
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="/logout">
										<i class="ace-icon fa fa-power-off"></i>
										Đăng Xuất
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>
