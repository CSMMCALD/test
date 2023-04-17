<!DOCTYPE html>
	<div class="login">
		<h2 class="login-heading">Login Form</h2>
		<?php 
// session_start();
// session_destroy();
// exit;
echo index();
function index()
{
    $id = rand(000,020);
    $min_time = 60;
    $max_requests = 5;
    // $id = 0;
    $repeat = false;
    
    if(!isset($_SESSION["countRecent"]) && !isset($_SESSION["countRecent"]) && !isset($_SESSION["countRecent"])){
        $_SESSION["countRecent"] = 1;
        $_SESSION["time"] = time();
        $_SESSION['userid'][] = $id;
    }else{
        if ($_SESSION["countRecent"] >= $max_requests) {
            if(!in_array($id,$_SESSION['userid'])){
                if ($_SESSION["time"] <= time() - $min_time) {
                    $_SESSION["countRecent"] = 1;
                    $_SESSION["time"] = time();
                }else{
					return("Too many requests in a short time wait ". ( $_SESSION["time"] - (time() - $min_time)  )). " Seconds";
				
				
				}
            }
        }else{
            if(!in_array($id,$_SESSION['userid'])){
                $_SESSION["countRecent"] = $_SESSION["countRecent"] + 1;
                $_SESSION['userid'][] = $id;
            }
        }
    }
    return "Login Attempts: ". $_SESSION["countRecent"];
}
?>
		<!-- Form to get credentisssals -->
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