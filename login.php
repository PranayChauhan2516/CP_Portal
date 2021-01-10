<!DOCTYPE html>

<html lang="en">

<?php include "db.php"; ?>
<?php include "functions.php"; ?>

	<head>
	    <meta charset="UTF-8">
	    <link rel="stylesheet" href="styles.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	    <title>Login</title>
	</head>
	<body>

		<div class="login-page">
		  <div class="form">
		  	<h2>Login</h2>
		    <form class="login-form" action="main.php" method="post">
		      <input type="text" name="rollnumber" placeholder="RollNumber"/>
		      <input type="password" name="password" placeholder="Password"/>
		      <button name="submit" type="submit">Login</button>
		      <p class="message">Not registered <a href="signup.php">Create an account</a></p>
		    </form>
		    <?php CheckData(); ?>
		  </div>
		</div>

	</body>

</html>