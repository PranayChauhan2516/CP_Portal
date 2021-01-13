<?php include "db.php";?>

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

			if ($connection) {
				$query = "SELECT password FROM rating WHERE rollnumber='$rollnumber'";
				$result = $connection->query($query);
				if ($result->num_rows > 0) {
					if ($row = $result->fetch_assoc()) {
						if (strcmp($row['password'],$password)==0) {
							echo "Login successful!, Welcome";
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
			$result = $connection->query($query);
			$id=1;
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<tr><td> ". $id ."</td><td> " . $row["firstname"]. " " . $row["lastname"]. "</td><td> " . $row["rollnumber"]. "</td><td> " . $row["totalScore"] . "<br>";
					$id++;
				}
			} else {
				echo "0 results!";
			}
		}
	}

?>