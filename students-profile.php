<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php"); // Redirect to the login page if the user is not logged in
}

include("php/db_connection.php");

// Retrieve user-specific data
$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($query);
$user_data = $result->fetch_assoc();

include 'php/students-profile.php'; // Include backend script for student details
?>

<!DOCTYPE html>
<html lang="en">
<head>
    	
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignLab" >
	<meta name="robots" content="" >
	<meta name="keywords" content="school, school admin, education, academy, admin dashboard, college, college management, education management, institute, school management, school management system, student management, teacher management, university, university management" >
	<meta name="description" content="Discover Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard" >
	<meta property="og:title" content="Akademi : School and Education Management Admin Dashboard Template" >
	<meta property="og:description" content="Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard">
	<meta property="og:image" content="https://akademi.dexignlab.com/xhtml/social-image.png" >
	<meta name="format-detection" content="telephone=no">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Page Title Here -->
	<title>MSHS: Students</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/ico" href="images/logo.ico">
	
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

	
	<!-- Style css -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
	 	
    <div id="preloader">
	  <div class="loader">
		<div class="dots">
			  <div class="dot mainDot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
		</div>
			
		</div>
	</div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
	
		<!--**********************************
			Nav header start
		***********************************-->
		<div class="nav-header">
			<a class="brand-logo">
				<img src="images/logo.png" alt="Logo" width="60" height="60">
				<div class="brand-title">
					<svg width="0" height="0" xmlns="http://www.w3.org/2000/svg">
					</svg>
				</div>
				<text style="font-size: 14px;">
					Management & Science High School
				</text>
			</a>		

			<div class="nav-control">
				<div class="hamburger">
					<span class="line"></span><span class="line"></span><span class="line"></span>
					<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect x="22" y="11" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="11" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="22" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="11" y="11" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="11" y="22" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect width="4" height="4" rx="2" fill="#2A353A"/>
						<rect y="11" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect x="22" y="22" width="4" height="4" rx="2" fill="#2A353A"/>
						<rect y="22" width="4" height="4" rx="2" fill="#2A353A"/>
					</svg>		
				</div>
			</div>
		</div>
		<!--**********************************
			Nav header end
		***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
		<div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
						<div class="dashboard_bar">
							Students
						</div>
                        </div>
                        <ul class="navbar-nav header-right">
						<li class="nav-item dropdown notification_dropdown all">
							<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
								<svg height="24" class="svg-main-icon" viewBox="0 0 32 32" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><clipPath id="clip_1"><path id="artboard_1" clip-rule="evenodd" d="m0 0h32v32h-32z"/></clipPath><g id="select" clip-path="url(#clip_1)"><path id="Vector" d="m4.70222 7.16834-.12871-.2574c-.0593-.11861-.13904-.22136-.23922-.30824-.10018-.08689-.21317-.1513-.33898-.19323-.1258-.04194-.25484-.0582-.38711-.0488-.13228.0094-.25772.04375-.37633.10306-.24699.12349-.41414.31622-.50147.5782-.08732.26197-.06923.51645.05426.76344l1.32093 2.64183c.0593.1186.13904.2214.23922.3083.10018.0868.21317.1512.33898.1932.1258.0419.25484.0582.38711.0488.13228-.0094.25772-.0438.37633-.1031.01854-.0092.03678-.0191.05471-.0295s.03552-.0214.05277-.0329l5.99999-3.99995c.1104-.07356.2024-.16543.2762-.27561s.1237-.23029.1497-.36032c.026-.13004.0261-.2601.0004-.39019-.0257-.13008-.0754-.25029-.1489-.36063-.1532-.22977-.3652-.37173-.636-.42588-.2707-.05416-.521-.00465-.7508.14853l-1.94316 1.29545-3.1143 2.07619zm11.29778-1.16834c-.2761 0-.5118.09763-.7071.29289s-.2929.43097-.2929.70711.0976.51184.2929.70711c.1953.19526.431.29289.7071.29289h14c.2761 0 .5118-.09763.7071-.29289.1953-.19527.2929-.43097.2929-.70711s-.0976-.51185-.2929-.70711-.431-.29289-.7071-.29289zm-11.27691 9.1683-.12871-.2574c-.12349-.2469-.31622-.4141-.5782-.5014-.26197-.0874-.51645-.0693-.76344.0542-.11861.0593-.22135.1391-.30824.2393-.08688.1001-.15129.2131-.19323.3389-.04193.1258-.0582.2549-.0488.3871.0094.1323.04376.2578.10306.3764l1.32092 2.6418c.1235.247.31623.4142.5782.5015.26198.0873.51646.0692.76345-.0543.01854-.0092.03678-.0191.05471-.0295s.03552-.0214.05277-.0329l6.00002-3.9999c.2298-.1532.3717-.3652.4259-.636.0541-.2708.0046-.521-.1486-.7508-.1531-.2298-.3651-.3717-.6359-.4259-.2708-.0541-.521-.0046-.7508.1485l-5.05749 3.3717zm11.27691-.1683c-.2761 0-.5118.0976-.7071.2929s-.2929.431-.2929.7071.0976.5118.2929.7071.431.2929.7071.2929h14c.2761 0 .5118-.0976.7071-.2929s.2929-.431.2929-.7071-.0976-.5118-.2929-.7071-.431-.2929-.7071-.2929zm-11.27691 8.1683-.12871-.2574c-.12349-.247-.31622-.4141-.5782-.5014-.26197-.0874-.51645-.0693-.76344.0542-.11861.0593-.22135.1391-.30824.2393-.08688.1001-.15129.2131-.19323.3389-.04193.1258-.0582.2549-.0488.3871.0094.1323.04376.2578.10306.3764l1.32092 2.6418c.1235.247.31623.4142.5782.5015.26198.0873.51646.0692.76345-.0543.01854-.0092.03678-.0191.05471-.0295s.03552-.0214.05277-.0329l6.00002-4c.1103-.0735.2024-.1654.2762-.2756.0738-.1101.1237-.2303.1497-.3603s.0261-.2601.0004-.3902c-.0258-.1301-.0754-.2503-.149-.3606-.1531-.2298-.3651-.3717-.6359-.4259-.2708-.0541-.521-.0046-.7508.1485l-1.94319 1.2955-3.1143 2.0762zm11.27691.8317c-.2761 0-.5118.0976-.7071.2929s-.2929.431-.2929.7071.0976.5118.2929.7071.431.2929.7071.2929h14c.2761 0 .5118-.0976.7071-.2929s.2929-.431.2929-.7071-.0976-.5118-.2929-.7071-.431-.2929-.7071-.2929z" fill-rule="evenodd"/></g></svg>
							</a>
								<div class="dropdown-menu dropdown-menu-end p-0">
									<div class="card mb-0">
										<div class="card-header border-0 d-block h-auto">
											<ul class="d-flex align-items-center justify-content-around">
												
												<li class="nav-item dropdown notification_dropdown">
												  <a class="nav-link bell dz-theme-mode" href="javascript:void(0);">
															<svg id="icon-light" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
													<svg id="icon-dark" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
												  </a>
												</li>
												<li class="nav-item dropdown notification_dropdown">
												  <a class="nav-link bell dz-fullscreen"  href="javascript:void(0);">
													 <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
													 <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="A098AE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
												  </a>
												</li>
																
											</ul>
										</div>
									</div>
								
								</div>
						</li>							
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode" href="javascript:void(0);">
									<i id="icon-light-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg></i>
                                    <i id="icon-dark-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg></i>
                                </a>
							</li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-fullscreen me-2"  href="javascript:void(0);">
                                    <svg id="icon-full-1" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                                    <svg id="icon-minimize-1" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="A098AE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                                </a>
							</li>
							
							<li class="nav-item">
								<div class="dropdown header-profile2">
									<a class="nav-link ms-0" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										<div class="header-info2 d-flex align-items-center">
											<div class="d-flex align-items-center sidebar-info">
												
											</div>
											<img src="images/no-img-avatar.png" class="ms-0" alt="">
										</div>
									</a>
									<div class="dropdown-menu dropdown-menu-end pb-0" style="box-shadow: 0px 0px 20px 5px black">
										<div class="card mb-0">
											<div class="card-header p-3">
												<ul class="d-flex align-items-center">
													<li>
														<img src="images/no-img-avatar.png" class="ms-0" alt="">
													</li>
													<li class="ms-2">
														<h4 class="mb-0"><?php echo $user_data['name']; ?></h4>
														<span><?php echo $user_data['position']; ?></span>
													</li>
												</ul>
											</div>
											<div class="card-body p-3">
												<a href="students-profile.php" class="dropdown-item ai-icon ">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"/>
															<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
															<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="var(--primary)" fill-rule="nonzero"/>
														</g>
													</svg>
													<span class="ms-2">Profile </span>
												</a>
											</div>
											<div class="card-footer text-center p-3">
												<a href="index.php" class="dropdown-item ai-icon btn btn-primary light">
													<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
													<span class="ms-2 text-primary">Logout </span>
												</a>
	
											</div>
										</div>
									</div>
								</div>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
			
		</div>
			<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
			<div class="dlabnav-scroll">	
				<ul class="metismenu" id="menu">
					<li><a href="students-dashboard.php">
						<i class="material-symbols-outlined">school</i>
						<span class="nav-text">Students</span>
						</a>
					</li>
				</ul>
				<div class="copyright" style="position:	absolute; bottom: 0;">
					<p class="fs-12">Made with <span class="heart"></span> by Ahmad Arief</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				<!-- Row -->
				<div class="row">
					<div class="col-xl-12">
						<div class="card h-auto">
							<div class="card-header p-0">
								<div class="user-bg w-100">
									<div class="user-svg">
										<svg width="264" height="109" viewBox="0 0 264 109" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="0.0107422" y="0.6521" width="263.592" height="275.13" rx="20" fill="#FCC43E"/>
										</svg>
									</div>
									<div class="user-svg-1">
										<svg width="264" height="59" viewBox="0 0 264 59" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect y="0.564056" width="263.592" height="275.13" rx="20" fill="#FB7D5B"/>
										</svg>

									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="d-flex justify-content-between">
									<div class="user">
										<div class="user-media">
											<img src="images/no-img-avatar.png" alt="" class="avatar avatar-xxl">
										</div>
										<div>
											<h2 class="mb-0"><?php echo htmlspecialchars($studentData['name'] ?? 'Name not available'); ?></h2>
											<p class="text-primary font-w600"><?php echo htmlspecialchars($studentData['class_stream'] ?? 'Class Stream not available'); ?> Stream Student</p>
										</div>
									</div>
									<div class="dropdown custom-dropdown">
										<div class="btn sharp tp-btn " data-bs-toggle="dropdown">
											<svg width="24" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M12.0012 0.359985C11.6543 0.359985 11.3109 0.428302 10.9904 0.561035C10.67 0.693767 10.3788 0.888317 10.1335 1.13358C9.88829 1.37883 9.69374 1.67 9.56101 1.99044C9.42828 2.31089 9.35996 2.65434 9.35996 3.00119C9.35996 3.34803 9.42828 3.69148 9.56101 4.01193C9.69374 4.33237 9.88829 4.62354 10.1335 4.8688C10.3788 5.11405 10.67 5.3086 10.9904 5.44134C11.3109 5.57407 11.6543 5.64239 12.0012 5.64239C12.7017 5.64223 13.3734 5.36381 13.8686 4.86837C14.3638 4.37294 14.6419 3.70108 14.6418 3.00059C14.6416 2.3001 14.3632 1.62836 13.8677 1.13315C13.3723 0.637942 12.7004 0.359826 12 0.359985H12.0012ZM3.60116 0.359985C3.25431 0.359985 2.91086 0.428302 2.59042 0.561035C2.26997 0.693767 1.97881 0.888317 1.73355 1.13358C1.48829 1.37883 1.29374 1.67 1.16101 1.99044C1.02828 2.31089 0.959961 2.65434 0.959961 3.00119C0.959961 3.34803 1.02828 3.69148 1.16101 4.01193C1.29374 4.33237 1.48829 4.62354 1.73355 4.8688C1.97881 5.11405 2.26997 5.3086 2.59042 5.44134C2.91086 5.57407 3.25431 5.64239 3.60116 5.64239C4.30165 5.64223 4.97339 5.36381 5.4686 4.86837C5.9638 4.37294 6.24192 3.70108 6.24176 3.00059C6.2416 2.3001 5.96318 1.62836 5.46775 1.13315C4.97231 0.637942 4.30045 0.359826 3.59996 0.359985H3.60116ZM20.4012 0.359985C20.0543 0.359985 19.7109 0.428302 19.3904 0.561035C19.07 0.693767 18.7788 0.888317 18.5336 1.13358C18.2883 1.37883 18.0937 1.67 17.961 1.99044C17.8283 2.31089 17.76 2.65434 17.76 3.00119C17.76 3.34803 17.8283 3.69148 17.961 4.01193C18.0937 4.33237 18.2883 4.62354 18.5336 4.8688C18.7788 5.11405 19.07 5.3086 19.3904 5.44134C19.7109 5.57407 20.0543 5.64239 20.4012 5.64239C21.1017 5.64223 21.7734 5.36381 22.2686 4.86837C22.7638 4.37294 23.0419 3.70108 23.0418 3.00059C23.0416 2.3001 22.7632 1.62836 22.2677 1.13315C21.7723 0.637942 21.1005 0.359826 20.4 0.359985H20.4012Z" fill="#A098AE"/>
											</svg>
										</div>
										<div class="dropdown-menu dropdown-menu-end">
											<a class="dropdown-item" href="students-edit-profile.php">Edit Details</a>
											<a class="dropdown-item" href="javascript:void(0);" id="predictClassStreamButton" data-bs-toggle="modal" data-bs-target="#predictionModal">Predict Class Stream</a>
										</div>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-xl-2 col-xxl-6 col-sm-6">
										<ul class="student-details">
											<li class="me-2">
												<a class="icon-box bg-secondary">
													<img src="images/svg/grades.svg" alt="">
												</a>
											</li>
											<li>
												<span>Current CGPA:</span><h5 class="mb-0"><?php echo htmlspecialchars($studentData['CGPA'] ?? 'CGPA not available'); ?></h5>
											</li>
										</ul>
									</div>
									<div class="col-xl-2 col-xxl-6 col-sm-6">
										
										<ul class="student-details">
											<li class="me-2">
												<a class="icon-box bg-secondary">
													<img src="images/profile.svg" alt="">
												</a>	

											</li>
											<li>
												<span>ID:</span><h5 class="mb-0"><?php echo htmlspecialchars($studentData['id'] ?? 'ID not available'); ?></h5>
											</li>
										</ul>
									</div>
									<div class="col-xl-2 col-xxl-6 col-sm-6">
										
										<ul class="student-details">
											<li class="me-2">
												<a class="icon-box bg-secondary">
													<img src="images/svg/location.svg" alt="">
												</a>	

											</li>
											<li>
												<span>Address:</span><h5 class="mb-0"><?php echo htmlspecialchars($studentData['address'] ?? 'Address not available'); ?></h5>
											</li>
										</ul>
									</div>
									<div class="col-xl-2 col-xxl-6 col-sm-6">
										<ul class="student-details">
											<li class="me-2">
												<a class="icon-box bg-secondary">
													<img src="images/svg/phone.svg" alt="">
												</a>	
											</li>
											<li>
												<span>Phone:</span><h5 class="mb-0"><?php echo htmlspecialchars($studentData['contact'] ?? 'Contact not available'); ?></h5>
											</li>
										</ul>
									</div>
									<div class="col-xl-2 col-xxl-6 col-sm-6">
										<ul class="student-details">
											<li class="me-2">
												<a class="icon-box bg-secondary">
													<img src="images/svg/email.svg" alt="">
												</a>	
											
											</li>
											<li>
												<span>Email:</span><h5 class="mb-0"><?php echo htmlspecialchars($studentData['email'] ?? 'Email not available'); ?></h5>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-10" style="margin: auto">
						<div class="page-title flex-wrap">
							<div class="table-responsive" style="margin: auto; width: 70%;">
									<h2 class="mb-0">Student's Academic Details</h2>
								<table class="table table-bordered verticle-middle table-responsive-sm">
									<thead>
										<tr>
											<th>Category</th>
											<th>Evaluation</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>Class Performance [Bahasa Melayu]</th>
											<td><?php echo htmlspecialchars($studentData['BM'] ?? 'Data not available'); ?></td>
										</tr>
										<tr>
											<th>Class Performance [English]</th>
											<td><?php echo htmlspecialchars($studentData['English'] ?? 'Data not available'); ?></td>
										</tr>
										<tr>
											<th>Class Performance [Sejarah]</th>
											<td><?php echo htmlspecialchars($studentData['Sejarah'] ?? 'Data not available'); ?></td>
										</tr>
										<tr>
											<th>Class Performance [Mathematics]</th>
											<td><?php echo htmlspecialchars($studentData['Maths'] ?? 'Data not available'); ?></td>
										</tr>
										<tr>
											<th>Class Performance [Science]</th>
											<td><?php echo htmlspecialchars($studentData['Science'] ?? 'Data not available'); ?></td>
										</tr>
										<tr>
											<th>Physical Performance</th>
											<td><?php echo htmlspecialchars($studentData['Physical'] ?? 'Data not available'); ?></td>
										</tr>
										<tr>
											<th>Interests</th>
											<td>
												<?php 
												if (isset($studentData['Interests'])) {
													// Split the interests into an array
													$interestsArray = explode(';', $studentData['Interests']);

													// Apply htmlspecialchars to each interest and then join them with <br>
													$sanitizedInterests = array_map('htmlspecialchars', $interestsArray);
													$formattedInterests = implode('<br>', $sanitizedInterests);

													echo $formattedInterests;
												} else {
													echo 'Data not available';
												}
												?>
											</td>
										</tr>
										<tr>
											<th>Ambition</th>
											<td><?php echo htmlspecialchars($studentData['Ambition'] ?? 'Data not available'); ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--**********************************-->
		
		
        <!--**********************************
            Content body end
        ***********************************-->
		
		<!--**********************************
			Footer start
		***********************************-->
		<div class="footer out-footer style-2">
			<div class="copyright">
				<p>Copyright © Designed &amp; Developed by <a target="_blank">Ahmad Arief</a> | 2023</p>
			</div>
		</div>
		<!--**********************************
			Footer end
		***********************************-->

	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

	<!--**********************************
	Modal
	***********************************-->

	<div id="predictionModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="predictionModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="predictionModalLabel">Prediction Result</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body" id="predictionModalBody">
					<p>Loading...</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

	
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
	<!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>

	
	<script src="vendor/wow-master/dist/wow.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>

	<script>
		document.getElementById('predictClassStreamButton').addEventListener('click', function() {
			// Get the student ID without removing leading '0'
			var studentId = "<?php echo $studentId; ?>";
			var requestUrl = "php/Prediction/prediction.php?id=" + encodeURIComponent(studentId);

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4) {
					if (this.status == 200) {
						// Handle the response. Example:
						var response = JSON.parse(this.responseText);
						if (response.hasOwnProperty('output')) {
							var output = response.output; // Get the output from the response
							document.getElementById('predictionModalBody').innerHTML = '<p>' + output + '</p>';
						} else {
							console.error("Response does not contain 'output' field.");
						}
					} else {
						console.error("Request failed with status: " + this.status);
					}
				}
			};
			xhttp.open("GET", requestUrl, true);
			xhttp.send();
		});
	</script>
	
</body>
</html>