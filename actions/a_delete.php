<?php

	require_once 'db_connect.php';


	if($_POST) {

	    $id = $_POST['id'];

	    $sql = "DELETE FROM events WHERE id = {$id}";

	    if($conn->query($sql) === TRUE) {
	        echo "<p>Successfully deleted!!</p>";
	        echo "<a href='../home.php'><button type='button'>Back</button></a>";
	    } else {
	        echo "Error updating record : " . $conn->error;
	    }

	    $conn->close();
	}

?>

