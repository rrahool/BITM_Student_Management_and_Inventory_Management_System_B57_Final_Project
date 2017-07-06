<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();

use App\Message\Message;
use App\Utility\Utility;


?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../../../../../resources/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="../../../../../resources/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../../../../../resources/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="../../../../../resources/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="../../../../../resources/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="../../../../../resources/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="../../../../../resources/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="../../../../../resources/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../../../../resources/assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="../../../../../resources/assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="../../../../../resources/assets/js/plugins/ui/drilldown.js"></script>
	<script type="text/javascript" src="../../../../../resources/assets/js/plugins/ui/fab.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="../../../../../resources/assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="../../../../../resources/assets/js/core/app.js"></script>
	<script type="text/javascript" src="../../../../../resources/assets/js/pages/login.js"></script>

	<script type="text/javascript" src="../../../../../resources/assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /theme JS files -->

</head>

<body class="navbar-bottom login-container login-cover">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-indigo has-shadow">
		<div class="navbar-header">
			<a class="navbar-brand" href="../index_2.php"><img src="../../../../../resources/assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-grid3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">

			<div class="navbar-right">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="#">
							Back to website
						</a>
					</li>

					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog3"></i>
							<span class="visible-xs-inline-block position-right"> Options</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

							<div  id="message" class="form button"   style="font-size: smaller" >
								<center>
									<?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
										echo "&nbsp;".Message::message();
									}
									Message::message(NULL);
									?></center>
							</div>
						<?php } ?>
					</div>
					<div class="col-md-3"></div>
				</div>

		<!-- Page content -->
		<div class="page-content">


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Registration form -->
				<form action="registration.php" method="post" class="registration-form">
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3">
							<div class="panel">
								<div class="panel-body">
									<div class="text-center">
										<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
										<h5 class="content-group-lg">Create Admin Account <small class="display-block">All fields are required</small></h5>
									</div>


									<div class="row">
										<div class="col-md-6">
											<div class="form-group has-feedback">
												<input type="text" name="firstname" class="form-control" placeholder="First name" required="required">
												<div class="form-control-feedback">
													<i class="icon-user-check text-muted"></i>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group has-feedback">
												<input type="text" name="lastname" class="form-control" placeholder="Last name" required="required">
												<div class="form-control-feedback">
													<i class="icon-user-check text-muted"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group has-feedback">
												<input type="text" name="email" class="form-control" placeholder="Email" required="required">
												<div class="form-control-feedback">
													<i class="icon-mention text-muted"></i>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group has-feedback">
												<input type="text" name="username" class="form-control" placeholder="Username" required="required">
												<div class="form-control-feedback">
													<i class="icon-user-plus text-muted"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group has-feedback">
												<input type="password" name="password" class="form-control" placeholder="Password" required="required">
												<div class="form-control-feedback">
													<i class="icon-user-lock text-muted"></i>
												</div>
											</div>
										</div>

									</div>


									<div class="form-group">


										<div class="checkbox">
											<label>
												<input type="checkbox" class="styled">
												Accept <a href="#">terms of service</a>
											</label>
										</div>
									</div>

									<div class="clearfix">
										<button type="button" class="btn btn-default pull-left"><i class="icon-arrow-left13 position-left"></i> Login</button>
										<button type="submit" class="btn bg-pink-400 btn-labeled btn-labeled-right pull-right"><b><i class="icon-plus3"></i></b> Create account</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!-- /registration form -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


	<!-- Footer -->
	<div class="navbar navbar-default navbar-fixed-bottom footer">
		<ul class="nav navbar-nav visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="footer">
			<div class="navbar-text">
				&copy; 2015. <a href="#" class="navbar-link">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" class="navbar-link" target="_blank">Eugene Kopyov</a>
			</div>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li><a href="#">About</a></li>
					<li><a href="#">Terms</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /footer -->

</body>

<script>
	$('.alert').slideDown("slow").delay(5000).slideUp("slow");
</script>

</html>
