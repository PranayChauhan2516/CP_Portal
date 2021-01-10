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
		    	<form class="login-form" action="login.php" method="post">

			    	<input type="text" name="firstname" placeholder="First Name"/>
			    	<input type="text" name="lastname" placeholder="Last Name"/>
			      	<input type="text" name="rollnumber" placeholder="Roll Number"/>
			      	<input type="password" name="password" placeholder="Set Password"/>
			      	<input type="text" name="year" placeholder="Year"/>
			      	<input type="text" name="branch" placeholder="Branch"/>
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