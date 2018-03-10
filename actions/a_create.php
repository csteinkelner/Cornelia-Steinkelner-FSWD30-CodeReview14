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
	    $type = $_POST['type_id'];

	    $date_id = $_POST['id'];
	    $location_id = $_POST['location_id'];
	    
	 
	    $sql = "INSERT INTO events (name, description, image, capacity, contact_email, contact_phonenumber, fk_event_type_id) VALUES ('$name', '$description', '$image', '$capacity', '$contact_email', '$contact_phonenumber', '$type')";

	    $sql2 = "INSERT INTO event_date (date_id, start_date, end_date) VALUES ('$date_id', '$start_date', '$end_date')";

	    $sql3 = "INSERT INTO address (address_id, location, street, postal_code, city) VALUES ('$location_id', '$location', '$street', '$postal_code', '$city')";

	    if($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
	        echo "<p>New Record Successfully Created</p>";
	        echo "<a href='../create.php'><button type='button'>Back</button></a>";
	        echo "<a href='../home.php'><button type='button'>Home</button></a>";
	    } else {
	        echo "Error " . $sql . ' ' . $conn->connect_error;
	    }
	    $conn->close();
	}
?>