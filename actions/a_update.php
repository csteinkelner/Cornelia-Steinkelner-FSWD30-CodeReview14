<?php

require_once 'db_connect.php';

	if($_POST) {
	    $name = $_POST['name'];
	    $start_date = $_POST['start_date'];
	    $end_date = $_POST['end_date'];
	    $description = $_POST['description'];
	    $image = $_POST['image'];
	    $capacity = $_POST['capacity'];
	    $contact_email = $_POST['email'];
	    $contact_phonenumber = $_POST['phonenumber'];
	    $location = $_POST['location'];
	    $street = $_POST['street'];
	    $postal_code = $_POST['postal_code'];
	    $city = $_POST['city'];

	    $id = $_POST['id'];

	    $sql = "UPDATE events SET name = '$name', start_date = '$start_date', end_date = '$end_date', description = '$description', image = '$image', capacity = '$capacity', contact_email = '$contact_email', contact_phonenumber = '$contact_phonenumber', location = '$location', street = '$street', postal_code = '$postal_code', city = '$city', WHERE id = {$id}";

	    if($conn->query($sql) === TRUE) {
	        echo "<p>Succcessfully Updated</p>";
	        echo "<a href='../update.php?id=".$id."'><button type='button'>Back</button></a>";
	        echo "<a href='../home.php'><button type='button'>Home</button></a>";
	    } else {
	        echo "Erorr while updating record : ". $conn->error;
	    }

	    $conn->close();

	}

?>