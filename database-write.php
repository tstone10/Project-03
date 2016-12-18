<?php
	$firstname = Trim(stripslashes($_POST['firstname']));
	$lastname = Trim(stripslashes($_POST['lastname']));
	$phone = Trim(stripslashes($_POST['phone']));

	include 'db-info.php';

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// 2. Perform database query
	$query = "SELECT * FROM friends ";


	$query = "INSERT INTO friends (first_name, last_name, phone)
	VALUES ('$firstname', '$lastname', '$phone')";

	$result = mysqli_query($connection, $query);

	$NumberOfRowsAffected = mysqli_affected_rows($connection);
	if($NumberOfRowsAffected < 1 ) {
 		die('No records were written to the database. Waaaa!');
	} 
	
	mysqli_close($connection);
	header("Location: database-read.php");
?>