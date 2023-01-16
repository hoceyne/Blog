<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
	<title>Log in - NNN</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
	<link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>

	<iframe name="votar" tabindex="-1" style="position:absolute; top: -10000px;overflow:hidden">
	</iframe>
	<div class="login-form">
		<form action="login.php" method="post" id="login-form">
			<input name="email" type="text" placeholder="enter your email">
			<input name="password" type="password" placeholder="enter your password">
			<input type="button" value="login" onclick="submitForm()">
		</form>
	</div>

	<script>
		var form = document.getElementById("login-form");

		function submitForm() {
			form.submit();
			form.reset();
		}
	</script>
</body>

</html>