<?php include 'inc/header.php';?>


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<?php include 'inc/sidebar.php';?>

			<!-- Main content -->
			<div class="content-wrapper">

				<?php
					use App\Message\Message;
					$msg = Message::message();

					echo "<div> <div id='message'> $msg </div> </div>";

				?>

				<!-- Content area -->

					<!-- Main charts -->
					<div class="row">
						<div class="col-lg-7">

							<!-- add courses -->
							<div class="panel panel-flat">
									<form action="batchStore.php" method="post" class="form-horizontal">
										<div class="panel panel-flat">
											<div class="panel-heading">
												<h5 class="panel-title">Add New Batch</h5>
												<div class="heading-elements">
													<ul class="icons-list">
														<li><a data-action="collapse"></a></li>
													</ul>
												</div>
											</div>

											<div class="panel-body">

												<div class="form-group">
													<label class="col-lg-3 control-label">Select Course</label>
													<div class="col-lg-9">
														<select class="select" name="course">
																<option value="PHP">Web App Develop-PHP</option>
																<option value="Web Design">Web Design</option>
																<option value="Dot Net">Web App Develop-Dot NET</option>
																<option value="Android">Mobile App Develop-Android</option>
														</select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-lg-3 control-label">Batch Name:</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="batch">
													</div>
												</div>


												<div class="text-right">
													<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
												</div>
											</div>
										</div>
									</form>
							</div>
							<!-- /add courses -->

						</div>

					</div>
					<!-- /main charts -->

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

<?php include 'inc/footer.php';?>