<!DOCTYPE html>
<html lang="en">
<?php include "db.php"; ?>
<?php include "functions.php"; ?>
	<head>
	    <meta charset="UTF-8">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	    <title>Home</title>
	</head>

	<body>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
	    	<a class="navbar-brand" href="main.php">RatingPortal</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				    <li class="nav-item active">
				      	<a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
				    </li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="#">Profile</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="login.php">Log-Out</a>
			      	</li>
				</ul>
			</div>
		</nav>  
		<table class="table">
		  	<thead>
		    	<tr>
		    		<th scope="col">ID</th>
		      		<th scope="col">Name</th>
		      		<th scope="col">Roll Number</th>
		      		<th scope="col">Total Score</th>
		    	</tr>
		  	</thead>
		  	<tbody>
				<?php displayData(); ?>
			</tbody>
		</table>
		
	</body>

</html>