<!DOCTYPE html>
	<div class="login">
		<h2 class="login-heading">Login Form</h2>
		<?php	
		//shows up if you have entered wrong credentials
		if ($_SESSION['hasAttempted'])
		{
			echo "INCORRECT CREDENTIALS";
		}
		//shows if you already have an account
		if ($_SESSION['alreadyHasAccount'])
		{
			echo "You already have an account";
		}
		?>
		<!-- Form to get credentials -->
		<form method="POST" onkeydown="return event.key != 'Enter';">
			<div class="imgcontainer">
				<img src="Users/user-images/default-profile-pic.png" alt="Avatar" class="avatar">
			</div>

			<div class="container modal-form">
				<label for ="email"><b>Email</b></label>
				<input type="text" class="form-control" placeholder="Enter Email Address" id="email" name="email" required>

				<label for="password"><b>Password</b></label>
				<input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" required>

				<button class="buttonSubmitLogins" formaction="../Users/loginScript.php">Login</button>
				<label>
				<input type="checkbox" checked="checked" name="remember"> Remember me <label>
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button onclick="location.href='../index.php'" type="button" class="cancelbtn" >Cancel</button>
				<span class="password"><a href="Users/recoverPassword.php">Forgot Password?</a></span>
			</div>
		</form>
	</div>