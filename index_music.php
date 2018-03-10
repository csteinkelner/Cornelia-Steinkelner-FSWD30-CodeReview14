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
		<div class="row">
			<div class="col-md-7 col-lg-7 col-7">
				<h1>Global event management</h1>
			</div>
			<div class="buttons" class="col-md-4 col-lg-4 col-4">
				<div class="buttons">
					<a href="login.php"><button type="submit" class="btn">Login</button></a>
					<a href="register.php"><button type="submit" class="btn">Sign up!</button></a>
				</div>
				
			</div>
		</div>
	</header><!-- /header -->
	<img src="img/hero.png" alt="">
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Big Events</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="index.php">Home</a></li>
	      <li><a href="index_arts.php">arts</a></li>
	      <li><a href="index_music.php">music</a></li>
	      <li><a href="index_sporty.php">sports</a></li>
	      <li><a href="index_movies.php">movies</a></li>
	      <li><a href="index_theater.php">theater</a></li>
	    </ul>
	  </div>
	</nav>
<div class="container">
	<div class="row">
		<?php 
			
			while ($row = mysqli_fetch_assoc($result)) {
				if ($row['fk_event_type_id'] == 2) {
					echo 
					"<div class='col-md-4 col-lg-4 col-4 col'>
						<div class='kard'>
							<div class='plac_img'>
							<a href='view.php?id=".$row['id']."'>
								<img src='img/".$row["image"]."' class='images'>
							</a>
							</div>
							<div>
								<h3>".$row["name"]."</h3>
								<p>".$row["location"]."</p>
								<p>".$row["start_date"]."</p>
							</div>
						</div>
					</div>";
				}
				
			};
		?>
		
	</div>
</div>
</body>
</html>