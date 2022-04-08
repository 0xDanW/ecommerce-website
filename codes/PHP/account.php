<!DOCTYPE html>
<html lang="en">
<head>  
	<title>Desk Authourity - Account</title>
   	<link rel="stylesheet" type="text/css" href="../CSS/acc.css"/>
   	<script src="https://kit.fontawesome.com/b626509e2f.js" crossorigin="anonymous"></script>
</head>  

<h2><a href="../homepage.html">Desk Authority</a></h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="signup.php" method="POST">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your E-Mail for registration</span>
			<input type="text" name="name" placeholder="Name" required/>
			<input type="email" name="email" placeholder="Email" required/>
			<input type="password" name="password" placeholder="Password" required/>
			<button type="submit" name="signUp">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="signin.php" method="POST">
			<h1>Sign In</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your E-Mail</span>
			<input type="email" name="email" placeholder="Email" required/>
			<input type="password" name="password" placeholder="Password" required/>
			<a href="#">Forgot your password?</a>
			<button type="submit" name="signIn">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>Please login with your personal info to keep yourself connected with us <3</p>
				<button class="ghost" id="signIn" name="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hi Pal!</h1>
				<p>Enter your personal details and start your journey with us! <3</p>
				<button class="ghost" id="signUp" name="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="../JavaScript/acc.js"></script>
</html> 