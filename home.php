<?php 
	ob_start();
	session_start();
	require_once 'actions/db_connect.php'; 
	

	$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);

	$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

	require_once 'parts/head.php';
?>
</head>
<body>
	
	<header id="header" class="">
		<div class="row">
			<div class="col-md-4 col-lg-4 col-4">
				<h1>big events!</h1>
			</div>
			<div class="buttons" class="col-md-4 col-lg-4 col-4">
				<div class="buttons">
					<button class="btn" id="sign-out">
					<a href="logout.php?logout">Sign Out</a>
				</button>
				</div>
				
			</div>
		</div>
	</header><!-- /header -->

	<div class="container">
		<table class="table admin_table">
			<thead>
				<tr>
					<th>image</th>
					<th>ID</th>
					<th>Name</th>
					<th id="date">Date</th>
					<th>Capacity</th>
					<th>email</th>
					<th>Phonenumber</th>
					<th>Location</th>
				</tr>
			</thead>
			<tbody>
				<?php

	            $sql = "SELECT * FROM `events`
					LEFT JOIN address ON events.fk_address_id = address.address_id
					LEFT JOIN event_date ON events.fk_date_id = event_date.date_id
					LEFT JOIN event_type ON events.fk_event_type_id = event_type.type_id";
	            $result = $conn->query($sql);

	            if($result->num_rows > 0) {
	                while($row = $result->fetch_assoc()) {
	                    	echo "<tr>
	                    	<td><img src='img/".$row["image"]."' class='images'></td>
	                        <td>".$row['id']."</td>
	                        <td>".$row['name']."</td>
	                        <td>".$row['start_date']." <br>-<br> ".$row['end_date']."</td>
	                        <td>".$row['capacity']."</td>
	                        <td>".$row['contact_email']."</td>
	                        <td>".$row['contact_phonenumber']."</td>
	                        <td>".$row['location']."</td>
	                        <td>
	                            <a href='update.php?id=".$row['id']."'><button type='button' class='btn admin_btn'>Edit</button></a>
	                            <a href='delete.php?id=".$row['id']."'><button type='button' class='btn admin_btn'>Delete</button></a>
	                        </td>
	                    </tr>";
	                }
	            }else {
	                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
	            }
            ?>
			</tbody>
		</table>
		<?php 
	    	echo "<a href='create.php'><button type='button' class='btn' id='aT'>Add Event</button></a>";
	    ?>
	</div>	

</body>
</html>
<?php ob_end_flush(); ?>