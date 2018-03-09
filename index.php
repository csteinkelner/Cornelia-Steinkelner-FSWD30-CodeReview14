<?php 

	require_once 'actions/db_connect.php';

	$sql= "SELECT * FROM `events`
			LEFT JOIN address ON events.fk_address_id = address.address_id
			LEFT JOIN event_date ON events.fk_date_id = event_date.date_id
			LEFT JOIN event_type ON events.fk_event_type_id = event_type.type_id";

	$result = mysqli_query($conn, $sql);

	//all bootstrap links in head
	require_once 'parts/head.php';
?>

</head>
<body>
	<header id="header" class="">
		<h1>big events!</h1>
		<div id="buttons">
			<a href="login.php"><button type="submit" class="btn">Login</button></a>
			<a href="register.php"><button type="submit" class="btn">Sign up!</button></a>
		</div>
	</header><!-- /header -->
<div class="container">
	<div class="row">
		<?php 
			while ($row = mysqli_fetch_assoc($result)) {
				echo 
					"<div class='col-md-4 col-lg-4 col-4'>
						<img src='img/".$row["image"]."' class='images'>
						<div>
							<h3>".$row["name"]."</h3>
							<p>".$row["location"]."</p>
						</div>
					</div>";
			};
		?>
		
	</div>
</div>
</body>
</html>