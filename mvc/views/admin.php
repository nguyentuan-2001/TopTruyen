<?php 
	require_once "./mvc/core/libs.php";
	require_once "./mvc/core/route.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $data['title'] ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php public_patch('img/logo.png') ?>" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="<?php public_patch('js/plugin/webfont/webfont.min.js') ?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php public_patch('css/main.css') ?>">
	<link rel="stylesheet" href="<?php public_patch('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php public_patch('css/atlantis.min.css') ?>">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?php public_patch('css/demo.css') ?>">
	<!-- CSS Font Awesome -->
	<link rel="stylesheet" href="<?php public_patch('css/fonts.min.css') ?>">
	<link rel="stylesheet" href="<?php public_patch('css/select2.css') ?>">
	<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"
      id="theme-styles"
    />
</head>
<body>
	<div class="wrapper sidebar_minimize">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="white">
				
				<a href="../index.html" class="logo">
					<img src="<?php public_patch('img/logo.png') ?>" alt="navbar brand" class="navbar-brand"  height="40px">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">			
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?php public_patch('img/profile.jpg') ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
						<?php 
						if(!isset($_SESSION['toptruyen_id'])) { ?>
							<a href="<?php echo login; ?>">Đăng nhập</a>
						<?php }else{ ?>
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<span class="user-level" style="font-size: 14px !important; margin-top:10px !important;"><?php echo $_SESSION['toptruyen_user'] ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse"><i class="fas fa-user-alt"></i> Tài khoản</span>
										</a>
									</li>
									<li>
										<a href="<?php echo logout; ?>">
											<span class="link-collapse"><i class="fas fa-sign-out-alt"></i> Đăng xuất</span>
										</a>
									</li>
								</ul>
							</div>
						<?php } ?>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item <?php active('admin/dashboard', 'active') ?>">
							<a href="<?php echo dashboard ?>" class="collapsed" >
								<i class="icon-speedometer"></i>
								<p>Dashboard</p>
							</a>
						</li>
						
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Danh mục</h4>
						</li>

						<li class="nav-item <?php active('admin/add_story', 'active') ?>">
							<a href="<?php echo add_story ?>" class="collapsed" >
								<i class="fas fa-plus"></i>
								<p>Đăng truyện</p>
							</a>
						</li>
						<li class="nav-item <?php active('admin/category', 'active') ?>">
							<a href="<?php echo category ?>">
								<i class="fas fa-layer-group"></i>
								<p>Thể loại truyện</p>
							</a>
						</li>
						<li class="nav-item <?php active('admin/story', 'active');active('admin/edit_story', 'active');active('admin/list_chapter', 'active');active('admin/edit_chapter', 'active'); ?>">
							<a href="<?php echo story; ?>">
								<i class="fas fa-th-list"></i>
								<p>Danh sách truyện</p>
							</a>
						</li>
						<li class="nav-item submenu">
							<a href="<?php echo APP_URL ?>">
								<i class="fas fa-home"></i>
								<p>Trang chủ</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="main-panel">
			<?php 
				require_once './mvc/views/'.$data['page'].'.php';
			?>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo APP_URL ?>">
									Toptruyen
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Liên hệ
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Trợ giúp
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						<a>Copyright &copy; <script>document.write(new Date().getFullYear());</script><i class="fa fa-heart heart text-danger"></i> by Nguyễn Bá Tuấn</a>
					</div>				
				</div>
			</footer>
		</div>
		
		
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							<button type="button" class="changeBackgroundColor" data-color="dark"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="<?php public_patch('js/core/jquery.3.2.1.min.js') ?>"></script>
	<script src="<?php public_patch('js/core/popper.min.js') ?>"></script>
	<script src="<?php public_patch('js/core/bootstrap.min.js') ?>"></script>
	<!-- jQuery UI -->
	<script src="<?php public_patch('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') ?>"></script>
	<script src="<?php public_patch('js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') ?>"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="<?php public_patch('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>
	<!-- Atlantis JS -->
	<script src="<?php public_patch('js/atlantis.min.js') ?>"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?php public_patch('js/setting-demo2.js') ?>"></script>
	<script src="<?php public_patch('js/main.js') ?>"></script>
	<script src="<?php public_patch('js/plugin/sweetalert/sweetalert.min.js') ?>"></script>

	<!-- jQuery Sparkline -->
	<script src="<?php public_patch('js/plugin/jquery.sparkline/jquery.sparkline.min.js') ?>"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
	<script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>

	<script>
		$('#lineChart').sparkline([102,109,120,99,110,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#177dff',
			fillColor: 'rgba(23, 125, 255, 0.14)'
		});

		$('#lineChart2').sparkline([99,125,122,105,110,124,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#f3545d',
			fillColor: 'rgba(243, 84, 93, .14)'
		});

		$('#lineChart3').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
	<?php
		if(isset($_COOKIE['message'])){
			$message = $_COOKIE['message'];
			setcookie('message', '', time()-1, '/');
			echo "<script>alert('$message');</script>";
		}
	?>
	<script>
		CKEDITOR.replace('introduce');
		CKEDITOR.replace('content');
		CKEDITOR.replace('content_edit');
	</script>
	<script>
        $(document).ready(function() {
            $('.simple-select2').select2({
                theme: 'bootstrap4',
                placeholder: "Chọn thể loại",
                allowClear: true
            });

            $('.simple-select2-sm').select2({
                theme: 'bootstrap4',
                containerCssClass: ':all:',
                placeholder: "Chọn thể loại",
                allowClear: true
            });
        });
    </script>
</body>
</html>