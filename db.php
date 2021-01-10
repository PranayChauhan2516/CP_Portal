<?php

$connection = mysqli_connect('localhost', 'root', '', 'student');  

if (!$connection) {
	echo "Unable to connect to the database!";
}

?>