<?php

	if(!isset($_SESSION))session_start();
	include_once('../../../../vendor/autoload.php');

	use App\Message\Message;

	$msg = Message::message();

?>

<?php include 'inc/header.php';?>


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">


			<?php include 'inc/sidebar.php';?>


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->

				<div class="content">

					<div class="row">
						<div class="col-md-6">
							<?php
							echo "<div style='background-color: lightskyblue; margin-bottom: 7px; border-radius: 5%; font-family: Comic Sans MS;'>
                                <div id='message' class='text-center'>
                                  <strong> $msg </strong>
                                </div>
                           </div>";
							?>
						</div>
					</div>

					<!-- Main charts -->
					<div class="row">
						<div class="col-lg-7">

							<!-- add courses -->
							<div class="panel panel-flat">
									<form action="trainerStore.php" method="post" class="form-horizontal">
										<div class="panel panel-flat">
											<div class="panel-heading">
												<h5 class="panel-title">Add New Trainer</h5>
												<div class="heading-elements">
													<ul class="icons-list">
														<li><a data-action="collapse"></a></li>
													</ul>
												</div>
											</div>

											<div class="panel-body">

												<div class="form-group">
													<label class="col-lg-3 control-label">Trainer Name:</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="trainer_name" required="required">
													</div>
												</div>

												<div class="form-group">
													<label class="col-lg-3 control-label">Email:</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="email" required="required">
													</div>
												</div>


												<div class="form-group">
													<label class="col-lg-3 control-label">Password:</label>
													<div class="col-lg-9">
														<input type="password" class="form-control" name="password" required="required">
													</div>
												</div>

												<div class="form-group">
													<label class="col-lg-3 control-label">Course Taken:</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="course_taken" required="required">
													</div>
												</div>

												<div class="text-right">
													<button type="submit" class="btn btn-primary">Add Trainer<i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</div>
										</div>
									</form>
							</div>
							<!-- /add courses -->

						</div>

					</div>
					<!-- /main charts -->


			<!-- Footer -->
				<div class="footer text-muted"">
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

<script>

	jQuery(

		function($) {
			$('#message').fadeOut (550);
			$('#message').fadeIn (550);
			$('#message').fadeOut (550);
			$('#message').fadeIn (550);
			$('#message').fadeOut (550);
			$('#message').fadeIn (550);
			$('#message').fadeOut (550);
		}
	)
</script>

<script type="text/javascript">
	function confirm_delete(){
		return confirm('Are you sure to Delete?');
	}
</script>


</body>

</html>