<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Login</title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Particles Login Form Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
	<script>
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Bootstrap -->
	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet">
	<link href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet">
	<link href="<?php echo base_url() . 'assets/css/font-awesome.css' ?>" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?php echo base_url() . 'assets/css/4-col-portfolio.css' ?>" rel="stylesheet">
	<link href="<?php echo base_url() . 'assets/css/dataTables.bootstrap.min.css' ?>" rel="stylesheet">
	<link href="<?php echo base_url() . 'assets/css/jquery.dataTables.min.css' ?>" rel="stylesheet">

	<!-- Stylesheets -->
	<link href="<?php echo base_url() . 'web/css/style.css' ?>" rel="stylesheet" type="text/css" />
	<!-- online fonts-->
	<link href="https://fonts.googleapis.com/css?family=Amiri:400,400i,700,700i" rel="stylesheet">

	<!-- //Meta-Tags -->
	<!-- Stylesheets -->
</head>

<body>
	<!--  particles  -->
	<div id="particles-js"></div>
	<!-- //particles -->
	<div class="w3ls-pos">
		<div class="w3ls-login box">

			<!-- form starts here -->
			<form action="<?php echo base_url() . 'administrator/cekuser' ?>" method="post">
				<div class="agile-field-txt">
					<div class="align-center">
						<h1>Sign in</h1>
					</div>

					<p><?php echo $this->session->flashdata('msg'); ?></p>
					<input type="Email" name="username" placeholder="info@example.com" required="" />
				</div>
				<div class="agile-field-txt">
					<input type="password" name="password" placeholder="password" required="" id="myInput" />
					<div class="agile_label">
						<input id="check3" name="check3" type="checkbox" value="show password">
						<label class="check" for="check3">Remember me</label>
					</div>
				</div>
				<div class="w3ls-bot">
					<input type="submit" value="LOGIN">
				</div>
			</form>

		</div>
		<!-- //form ends here -->
		<!--copyright-->
		<div class="copy-wthree">
			<p>© 2020 POS Login. All Rights Reserved | DL-Tech

			</p>
		</div>
		<!--//copyright-->
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src='js/particles.min.js'></script>
	<script src="js/index.js"></script>
	<script src="<?php echo base_url() . 'web/js/particles.min.js' ?>"></script>
	<script src="<?php echo base_url() . 'web/js/index.js' ?>"></script>


</body>

</html>