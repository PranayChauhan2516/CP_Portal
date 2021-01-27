<?php 
include "db.php";
?>

<?php

	function AddData() {
		//Retrieving the form values
		if (isset($_POST['submit'])) {
			global $connection;

			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$rollnumber = $_POST['rollnumber'];
			$password = $_POST['password'];
			$year = (int)$_POST['year'];
			$branch = $_POST['branch'];
			$codeforcesId = $_POST['codeforcesId'];
			$codechefId = $_POST['codechefId'];

			$firstname = mysqli_real_escape_string($connection, $firstname); 
			$lastname = mysqli_real_escape_string($connection, $lastname); 
			$rollnumber = mysqli_real_escape_string($connection, $rollnumber); 
			$password = mysqli_real_escape_string($connection, $password); 
			//$firstname = mysqli_real_escape_string($connection, $firstname); 
			$branch = mysqli_real_escape_string($connection, $branch); 
			$codeforcesId = mysqli_real_escape_string($connection, $codeforcesId); 
			$codechefId = mysqli_real_escape_string($connection, $codechefId); 

			if ($connection) {
				$query = "INSERT INTO rating 
						(firstname, lastname, rollnumber, password, year, branch, codeforces, codechef) 
						VALUES 
						('$firstname', '$lastname', '$rollnumber', '$password', '$year', '$branch', '$codeforcesId', '$codechefId'); ";

				if(mysqli_query($connection, $query)){
				    echo "Records inserted successfully.";
				    
				} else{
				    echo "ERROR: Could not able to execute.";
				}
			} else {
				echo "Error Connecting to the database!";
			}
		}
	}

	function CheckData() {
		if (isset($_POST['submit'])) {
			global $connection;

			$rollnumber = $_POST['rollnumber'];
			$password = $_POST['password'];
			$_SESSION['roll'] = $rollnumber;

			if ($connection) {
				$query = "SELECT password FROM rating WHERE rollnumber='$rollnumber'";
				$result = $connection->query($query);
				if ($result->num_rows > 0) {
					if ($row = $result->fetch_assoc()) {
						if (strcmp($row['password'],$password)==0) {
							echo "Login successful!, Welcome";
							header("Location: main.php?roll=".$_SESSION['roll']);
						} else {
							echo "Enter correct password!";
						}
					} else {
						echo "Given rollnumber does not exist!";
					}
				} else {
				  echo "Given rollnumber does not exist!";
				}
			}
		}
	}

	function displayData() {
		global $connection;
		if ($connection) {
			
			$query = "SELECT * FROM rating ORDER BY totalScore DESC";
			
			if(isset($_POST['search'])) {
				$search=$_POST['query'];
				$query="SELECT * FROM rating WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR rollnumber LIKE '%$search%'";
			}

			if(isset($_POST['year']) || isset($_POST['branch'])){

				$year=$_POST['year'];
				$branch=$_POST['branch'];

				if($year!="Year") {
					if($branch!="Branch") {
						$query="SELECT * FROM rating WHERE year='$year' AND branch='$branch' ORDER BY totalScore DESC";
					} else {
						$query="SELECT * FROM rating WHERE year='$year' ORDER BY totalScore DESC";
					}
				}
				else if ($year=="Year") {
					if($branch!="Branch") {
						$query="SELECT * FROM rating WHERE branch='$branch' ORDER BY totalScore DESC";
					} else {
						$query="SELECT * FROM rating ORDER BY totalScore DESC";
					}
				}
			}

			$result = $connection->query($query);
			$id=1;
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo 
					'<tr role="button" data-href="view.php?roll='. $_SESSION["roll"] . '?view=' . $row["rollnumber"] . '">
					<td> '. $id .'</td>
					<td> ' . $row["firstname"]. ' ' . $row["lastname"]. '</td>
					<td> ' . $row["rollnumber"]. '</td>
					<td> ' . $row["totalScore"] . '</td>
					</tr>';
					$id++;
				}
			} else {
				echo "<tr><td> 0 results! </td><td>";
			}
		}
	}

	function displayProfile() {
		global $connection;
		$rollnumber=$_SESSION['roll'];
		if ($connection) {
			$query = "SELECT * FROM rating WHERE rollnumber='$rollnumber' ORDER BY totalScore DESC";
			$result = $connection->query($query);
			$id=1;
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<tr><td> ". $id ."</td><td> " . $row["firstname"]. " " . $row["lastname"]. "</td><td> " . $row["rollnumber"]. "</td><td> " . $row["totalScore"] . "<br>";
					$id++;
				}
			} else {
				echo "<tr><td> 0 results! </td><td>";
			}

			$plot = "SELECT * FROM graph WHERE rollnumber='$rollnumber' ORDER BY date";
			$result = $connection->query($plot);
			$data=array();
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$totalScore = $row["totalScore"];
					$date = $row["Date"];
					array_push($data, array('y' => $totalScore, 'label' => $date));
				}
			} else {
				echo "Not Sufficient data!";
			}
			return $data;
		}
	}

	function displayOthersProfile() {
		global $connection;
		$rollnumber=$_SESSION['view'];
		if ($connection) {
			$query = "SELECT * FROM rating WHERE rollnumber='$rollnumber' ORDER BY totalScore DESC";
			$result = $connection->query($query);
			$id=1;
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<tr><td> ". $id ."</td><td> " . $row["firstname"]. " " . $row["lastname"]. "</td><td> " . $row["rollnumber"]. "</td><td> " . $row["totalScore"] . "<br>";
					$id++;
				}
			} else {
				echo "<tr><td> 0 results! </td><td>";
			}

			$plot = "SELECT * FROM graph WHERE rollnumber='$rollnumber' ORDER BY date";
			$result = $connection->query($plot);
			$data=array();
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$totalScore = $row["totalScore"];
					$date = $row["Date"];
					array_push($data, array('y' => $totalScore, 'label' => $date));
				}
			} else {
				echo "Not Sufficient data!";
			}
			return $data;
		}
	}

	function LogOut() {
		// remove all session variables
		session_unset();
		session_destroy();
		header('Location: login.php');
	}

?>