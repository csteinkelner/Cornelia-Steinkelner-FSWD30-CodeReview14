<?php
require_once 'actions/db_connect.php';


if($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `events`
                    LEFT JOIN address ON events.fk_address_id = address.address_id
                    LEFT JOIN event_date ON events.fk_date_id = event_date.date_id
                    LEFT JOIN event_type ON events.fk_event_type_id = event_type.type_id
                    WHERE id = {$id}";
    $result = $conn->query($sql);

    $data = $result->fetch_assoc();

    require_once 'parts/head.php';

?>
</head>
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
    	<?php
	        echo 
	            "<div class='row'>
					<div class='col-md-6 col-lg-6 col-6 left_col'>
						<img src='img/".$data['image']."'>
		            	<h1>"
		            	.$data['name'].
		            	"</h1> 
		                <p>"
		                .$data['description'].
		                "</p>
					</div>
	            	<div class='col-md-6 col-lg-6 col-6'>
	            		<h3>Location: ".$data['location']."</h3>
	            		<h4>".$data['street']."</h4>
	            		<h4>".$data['postal_code']." ".$data['city']."</h4>
	            		<h3>Capacity: ".$data['capacity']."</h3>
	            		<h3>Contacts:</h3><h4>Email: ".$data['contact_email']."</h4>
	            		<h4>Number: ".$data['contact_phonenumber']."</h4>
	            		<h4><a href=".$data['url'].">".$data['url']."</a></h4>
	            		<h3>".$data['start_date']." bis ".$data['end_date']."</h3>
					</div>
	            </div>";
	    ?>
	    <a href="index.php"><button type="button" class="btn">Back</button></a>
    </div>
<?php 
}
?>