<?php 
session_start();
include "db.php";
include "functions.php";
if (isset($_GET['logout'])) {
    LogOut();
}
$rollnumber=$_SESSION['roll'];
$_SESSION['view'] = substr($_SERVER['REQUEST_URI'], 60);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	    <title>Home</title>
	</head>

	<body>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
	    	<a class="navbar-brand" href="main.php?roll=<?php echo $rollnumber ?>">RatingPortal</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				    <li class="nav-item active">
				      	<a class="nav-link" href="main.php?roll=<?php echo $rollnumber ?>">Home <span class="sr-only">(current)</span></a>
				    </li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="profile.php?roll=<?php echo $rollnumber ?>">Profile</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="login.php?logout=true">Log-Out</a>
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
					<?php $data=displayOthersProfile(); ?>
				</tbody>
			</table>
			<div id="chartContainer" style="height: 300px; width: 100%;"></div>
		</font>

		<script>
			window.onload = function () {
			 
			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Scorecard Graph"
				},
				axisY: {
					title: "Total Score"
				},
				data: [{
					type: "line",
					dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart.render();
			 
			}
		</script>	
		<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>	
	</body>

</html>