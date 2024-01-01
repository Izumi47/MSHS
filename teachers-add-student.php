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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    	
   <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignLab" >
	<meta name="robots" content="" >
	<meta name="keywords" content="school, school admin, education, academy, admin dashboard, college, college management, education management, institute, school management, school management system, student management, teacher management, university, university management" >
	<meta name="format-detection" content="telephone=no">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Page Title Here -->
	<title>MSHS: Students</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/ico" href="images/logo.ico">
	<link rel="stylesheet" href="./vendor/chartist/css/chartist.min.css">
	<link href="vendor/wow-master/css/libs/animate.css" rel="stylesheet">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	
	<link href="vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	
	
	<!-- Style css -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<!-- Style css -->
    <link href="css/style.css" rel="stylesheet">

	<style>
    .form-check-label {
        margin-right: 50px;
		margin-left: 10px;
    }
</style>
	
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
								<a class="nav-link bell dz-fullscreen me-0"  href="javascript:void(0);">
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
											<img src="data:image/png;base64,<?php echo base64_encode($user_data["picture"]); ?>" alt="">
										</div>
									</a>
									<div class="dropdown-menu dropdown-menu-end pb-0" style="box-shadow: 0px 0px 20px 5px black">
										<div class="card mb-0">
											<div class="card-header p-3">
												<ul class="d-flex align-items-center">
													<li>
														<img src="data:image/png;base64,<?php echo base64_encode($user_data["picture"]); ?>" alt="">
													</li>
													<li class="ms-2">
														<h4 class="mb-0"><?php echo $user_data['name']; ?></h4>
														<span><?php echo $user_data['position']; ?></span>
													</li>
												</ul>
											</div>
											<div class="card-body p-3">
												<a href="teachers-profile.php" class="dropdown-item ai-icon ">
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
					<li><a href="teachers-dashboard.php">
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
				<form action="php/add-student.php" method="POST" id="addStudentForm">
					<div class="row">
						<div class="col-xl-12">
							<div class="card">
								<div class="card-header">
									<h5 class="mb-0">Student Details</h5>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-xl-12 col-lg-8">
											<div class="row">
												<div class="col-xl-6 col-sm-6">
													<div class="mb-3">
														<label class="form-label text-primary">Full Name <span class="required">*</span></label>
														<input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
													</div>

													<label class="form-label text-primary">Phone Number <span class="required">*</span></label>
													<div class="input-group mb-3 input-primary">
														<span class="input-group-text border-0">(+60)</span>
														<input type="number" class="form-control" id="contact" name="contact" placeholder="Phone Number" required>
													</div>

													<div class="mb-3">
														<label class="form-label text-primary">ID <span class="required">*</span></label>
														<input type="number" class="form-control" id="id" name="id" placeholder="Student ID" required>
													</div>

													<label class="form-label text-primary">Email Adress <span class="required">*</span></label>
													<div class="input-group mb-3 input-primary">
														<input type="text" class="form-control" id="email" name="email" placeholder="---@mshs.com" required>
														<span class="input-group-text border-0">@mshs.com</span>
													</div>
													
													<div class="mb-3">
														<label class="form-label text-primary">Classroom <span class="required">*</span></label>
														<input type="text" class="form-control" id="classroom" name="classroom" placeholder="Classroom" required>
													</div>
												</div>
												<div class="col-xl-6 col-sm-6">
													<div class="mb-3">
														<label lass="form-label text-primary">Address <span class="required">*</span></label>
														<input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
															
														</textarea>
													</div>
													
													<div class="mb-3">
														<label class="form-label text-primary">Interests <span class="required">*</span></label>
														<select multiple class="default-select form-control" id="interests" name="interests[]"  placeholder="(Choose one or more)" required>
															<option>Art and Creative Expression</option>
															<option>History and Social Studies</option>
															<option>Literature and Language Arts</option>
															<option>Mathematics</option>
															<option>Physical Education and Sports</option>
															<option>Science (Physics, Chemistry, Biology)</option>
															<option>Technology and Computer Science</option>
															<option>Environmental Studies</option>
															<option>Career and Vocational Interests</option>
															<option>Music and Performing Arts</option>
														</select>
													</div>

													<div class="mb-3">
														<label class="form-label text-primary">Ambition <span class="required">*</span></label>
														<select class="default-select  form-control wide" id="ambition" name="ambition" placeholder="(Choose one)" required>editTeacherModal
															<option>Doctor or Healthcare Professional</option>
															<option>Engineer (e.g., Mechanical, Civil, Electrical)</option>
															<option>Computer Scientist or Software Developer</option>
															<option>Teacher or Educator</option>
															<option>Artist or Creative Professional</option>
															<option>Entrepreneur or Business Owner</option>
															<option>Musician or Performer</option>
															<option>Lawyer or Legal Professional</option>
															<option>Athlete or Sports Coach</option>
															<option>Scientist or Researcher</option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header">
								<h5 class="mb-0">Academic Details</h5>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-xl-6 col-sm-6">
										<div class="mb-3">
											<label class="form-label text-primary">Current CGPA <span class="required">*</span></label>
											<input type="text" class="form-control" id="CGPA" name="CGPA" placeholder="0.00 - 4.00" required>editTeacherModal
										</div>

										<div class="mb-3">
											<label class="form-label text-primary">Class Performance [Bahasa Melayu] <span class="required">*</span></label>
											<select class="default-select  form-control wide" id="bm" name="bm" placeholder="(Choose one)" required>editTeacherModal
												<option>Bad</option>
												<option>Poor</option>
												<option>Average</option>
												<option>Good</option>
												<option>Excellent</option>
											</select>
										</div>

										<div class="mb-3">
											<label class="form-label text-primary">Class Performance [English] <span class="required">*</span></label>
											<select class="default-select  form-control wide" id="english" name="english" placeholder="(Choose one)" required>editTeacherModal
												<option>Bad</option>
												<option>Poor</option>
												<option>Average</option>
												<option>Good</option>
												<option>Excellent</option>
											</select>
										</div>

										<div class="mb-3">
											<label class="form-label text-primary">Class Performance [Sejarah] <span class="required">*</span></label>
											<select class="default-select  form-control wide" id="sejarah" name="sejarah" placeholder="(Choose one)" required>editTeacherModal
												<option>Bad</option>
												<option>Poor</option>
												<option>Average</option>
												<option>Good</option>
												<option>Excellent</option>
											</select>
										</div>
									</div>
									
									<div class="col-xl-6 col-sm-6">
										<div class="mb-3">
											<div class="mb-3">
												<label class="form-label text-primary">Class Performance [Mathematics] <span class="required">*</span></label>
												<select class="default-select  form-control wide" id="maths" name="maths" placeholder="(Choose one)" required>editTeacherModal
													<option>Bad</option>
													<option>Poor</option>
													<option>Average</option>
													<option>Good</option>
													<option>Excellent</option>
												</select>
											</div>

											<div class="mb-3">
												<label class="form-label text-primary">Class Performance [Science] <span class="required">*</span></label>
												<select class="default-select  form-control wide" id="science" name="science" placeholder="(Choose one)" required>editTeacherModal
													<option>Bad</option>
													<option>Poor</option>
													<option>Average</option>
													<option>Good</option>
													<option>Excellent</option>
												</select>
											</div>

											<label class="form-label text-primary">Physical Performance <span class="required">*</span></label>
											<div class="mb-3 mb-0">
												<div class="form-check custom-checkbox d-inline-block mb-2">
													<input type="radio" class="form-check-input" id="physical1" name="physical" value="1">
													<label class="form-check-label">1</label>
												</div>
												<div class="form-check custom-checkbox d-inline-block mb-2 mx-2">
													<input type="radio" class="form-check-input" id="physical2" name="physical" value="2">
													<label class="form-check-label">2</label>
												</div>
												<div class="form-check custom-checkbox d-inline-block mb-2">
													<input type="radio" class="form-check-input" id="physical3" name="physical" value="3">
													<label class="form-check-label">3</label>
												</div>
												<div class="form-check custom-checkbox d-inline-block mb-2">
													<input type="radio" class="form-check-input" id="physical4" name="physical" value="4">
													<label class="form-check-label">4</label>
												</div>
												<div class="form-check custom-checkbox d-inline-block mb-2">
													<input type="radio" class="form-check-input" id="physical5" name="physical" value="5">
													<label class="form-check-label">5</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="">
						<a href="teachers-dashboard.php" class="btn btn-outline-primary me-3" style="color:#E1E1E1E1">Cancel</a>
						<button class="btn btn-primary" type="submit" id="register-button">Add Student</button> <!--Send to add-student.php-->
					</div>
				</form>	
			</div>
		</div>
		
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
        Modals
    ***********************************-->
	
	<!--Add Student Successful-->
	<div class="modal fade" id="addStudentModal">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Success</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal">
					</button>
				</div>
				<div class="modal-body">
					<p>Student added successfully!</p>
				</div>
				<div class="modal-footer">
					<a href="teachers-dashboard.php"><button type="button" class="btn btn-primary">Continue</button></a>
				</div>
			</div>
		</div>
	</div>
	<!--Student Already Exists-->
	<div class="modal fade" id="warningModal">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Warning</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<p>Student ID already existed!</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Back</button>
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
	<script src="vendor/moment/moment.min.js"></script>
	

	<script src="vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js"></script>
	<script src="vendor/wow-master/dist/wow.min.js"></script>
	<script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
	<script>
		$(document).ready(function () {
			$('#addStudentForm').submit(function (event) {
				event.preventDefault();
				console.log($('#addStudentForm').serialize()); // Debugging
				$.ajax({
					type: 'POST',
					url: 'php/teachers-add-student.php',
					data: $('#addStudentForm').serialize(),
					success: function (response) {
						console.log(response); // Debugging
						if (response.trim() === 'Student record added successfully!') {
							// Show the success modal
							$('#addStudentModal').modal('show');
						} else {
							// Show the warning modal
							$('#warningModal').modal('show');
						}
					},
					error: function (xhr, status, error) {
						console.error("AJAX error: Status - " + status + ", Error - " + error);
					}
				});
			});
		});
	</script>

</body>
</html>