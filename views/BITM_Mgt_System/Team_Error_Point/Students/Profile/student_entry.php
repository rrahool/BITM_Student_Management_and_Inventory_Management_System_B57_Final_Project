<?php
include_once('../../../../../vendor/autoload.php');

if( !isset($_SESSION) )session_start();

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
	<title>Student Entry</title>

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
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="../../../../../resources/assets/js/core/app.js"></script>

	<script type="text/javascript" src="../../../../../resources/assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container login-cover-st">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-indigo">
		<div class="navbar-header">
			<p style="padding-top: 14px; padding-left: 22px;">
				<img src="../../../../../resources/assets/images/logo_icon_light.png" alt="" height="18px"; width="25px";>
				<b style="padding-left: 5px; font-size: 15px;">Student Entry</b>
			</p>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
					</a>
				</li>

				<li>
					<a href="#">
						<i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
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

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					<form action="../Authentication/entry_2.php" method="post">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Student Entry <small class="display-block">Enter your credentials below</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" name="seid" class="form-control" placeholder="SEID" required="required">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" name="email" class="form-control" placeholder="Email" required="required">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>


							<div class="form-group">
								<button type="submit" class="btn bg-brown-700 btn-block">Confirm Your Entry<i class="icon-circle-right2 position-right"></i></button>
							</div>

						</div>
					</form>
					<!-- /simple login form -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
					&copy; 2017. <a href="#">BITM Management System Web App</a> by <a href="teamerrorpoint@gmail.com" target="_blank">Team Error Point - PHP B57</a>
				</div>
				<!-- /footer -->

			</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>

<script>
	$('.alert').slideDown("slow").delay(5000).slideUp("slow");
</script>

</html>
