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

			<form class="form-inline my-2 my-lg-0" method="post" action="main.php">
      			<input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
      			<button class="btn btn-primary btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
    		</form>
		</nav>  
		<font size="5">
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
		</font>

		
			<div class="card" style="align-items: center;">
				<form action="main.php" method="post">
				    <div class="form-row align-items-center">
				    	<div class="col-auto my-1">
				      		<label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Year</label>
					      	<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="year">
						        <option selected>Year</option>
						        <option value="1">1</option>
						        <option value="2">2</option>
						        <option value="3">3</option>
						        <option value="4">4</option>
					      	</select>
				    	</div>
					    <div class="col-auto my-1">
					      	<label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Branch</label>
					      	<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="branch">
						        <option selected>Branch</option>
						        <option value="CSE">CSE</option>
						        <option value="EC">EC</option>
						        <option value="EE">EE</option>
						        <option value="ME">ME</option>
						        <option value="IC">IC</option>
				      		</select>
					    </div>
					    <div class="col-auto my-1">
					      	<button type="submit" class="btn btn-primary">Submit</button>
					    </div>
				 	</div>
				</form>
			</div>


	</body>

</html>