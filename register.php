<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

	<?php
	if (isset($_GET['alert'])) {
		print '<script>swal("Berhasil!", ("' . $_GET['alert'] . '"), "success");</script>';
	}elseif (isset($_GET['gagal'])) {
		print '<script>swal("Gagal!", ("' . $_GET['gagal'] . '"), "error");</script>';
	}
	?>

	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="fungsi/action/login_action.php" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="username" placeholder="User name" required="">
					<input type="password" name="sandi" placeholder="Password" required="">
					<button class="btn bg-primary">Login</button>
				</form>
			</div>

			<div class="login">
				<form action="fungsi/action/register_action.php" enctype="multipart/form-data" method="post">
					<label for="chk" aria-hidden="true">Sign Up</label>
                    <input type="text" name="first_name" placeholder="First Name" required="">
                    <input type="text" name="last_name" placeholder="Last Name" required="">
					<input type="text" name="username" placeholder="Username" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="sandi" placeholder="Password" required="">
					<button>Sign Up</button>
				</form>
			</div>
	</div>
</body>
</html>