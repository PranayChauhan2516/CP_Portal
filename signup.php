<!DOCTYPE html>
<html lang="en">
<?php include "db.php"; ?>
<?php include "functions.php"; ?>
	<head>
	    <meta charset="UTF-8">
	    <link rel="stylesheet" href="styles.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	    <title>SignUp</title>
	</head>

	<body>

		<div class="login-page">
		  	<div class="form">
		  		<h2>Sign Up</h2>
		    	<form class="login-form" action="signup.php" method="post">

			    	<input type="text" name="firstname" placeholder="First Name"/>
			    	<input type="text" name="lastname" placeholder="Last Name"/>
			      	<input type="text" name="rollnumber" placeholder="Roll Number"/>
			      	<input type="password" name="password" placeholder="Set Password"/>
			      	<input type="number" name="year" min="1" max="4" placeholder="Year"/>
			      	<input list="branches" name="branch" placeholder="Branch"/>
						<datalist id="branches">    
						    <option value="CSE"> 
						    <option value="EC">
						    <option value="EE">
						    <option value="ME"> 
						    <option value="IC">
						</datalist>
			      	<input type="text" name="codeforcesId" placeholder="Codeforces ID"/>
			      	<input type="text" name="codechefId" placeholder="Codechef ID"/>
			      	<button name="submit" type="submit">SignUp</button>
			    	<p class="message">Already have an account?<a href="login.php">Login</a></p>
		    	</form>
		    	<?php AddData(); ?>
		  	</div>
		</div>

	</body>

</html>