<?php 
require_once 'actions/db_connect.php';
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
		<h2>Add a new Event</h2>
        <form action="actions/a_create.php" method="post">
	        <table cellspacing="0" cellpadding="0" class="table">
	            
	            <tr>
	                <th>Name</th>
	                <td><input type="text" name="name" placeholder="name"/></td>
	            </tr>
	            <tr>
	                <th>Date ID</th>
	                <td><input type="text" name="id" placeholder="first additional ID would be 7"/></td>
	            </tr>
	            <tr>
	                <th>Startdate</th>
	                <td><input type="text" name="start_date" placeholder="start_date"/></td>
	            </tr>
	            <tr>
	                <th>Enddate</th>
	                <td><input type="text" name="end_date" placeholder="end_date"/></td>
	            </tr>
	            <tr>
	                <th>description</th>
	                <td><input type="text" name="description" placeholder="description"/></td>
	            </tr>
	            <tr>
	                <th>Image</th>
	                <td><input type="text" name="image" placeholder="please enter a link or file"/></td>
	            </tr>
	            <tr>
	                <th>Capacity</th>
	                <td><input type="text" name="capacity" placeholder="capacity"/></td>
	            </tr> 
	            <tr>
	                <th>Contact Email</th>
	                <td><input type="text" name="email" placeholder="email"/></td>
	            </tr> 
	            <tr>
	                <th>Contact Phonenumber</th>
	                <td><input type="text" name="phonenumber" placeholder="phonenumber"/></td>
	            </tr>
	            <tr>
	                <th>Address</th>
	                <td><input type="text" name="location_id" placeholder="first additional ID would be 7"/></td> 
	                <td><input type="text" name="location" placeholder="Location"/></td>
	                <td><input type="text" name="street" placeholder="Street and number"/></td>
	                <td><input type="text" name="postal_code" placeholder="Postal Code"/></td>
	                <td><input type="text" name="city" placeholder="City"/></td>
	            </tr>
	            <tr>
	                <th>URL</th>
	                <td><input type="text" name="ulr" placeholder="url"/></td>
	            </tr> 
	            <tr>
	                <th>Type</th>
	                <td><input type="text" name="type_id" placeholder="ID 1-5"/></td>

	            </tr> 
	            <tr>
	                <td><button type="submit">add event</button></td>
	                <td><a href="home.php"><button type="button">Back</button></a></td>
	           	</tr>
	        </table>
	    </form>

	    <table class="table">
        <caption>Types for reference</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>type</th>
            </tr>
        </thead>
        <tbody>
            <?php  
                $types = "SELECT * FROM `event_type`";
                $types_res = mysqli_query($conn, $types);

                    while($row = mysqli_fetch_assoc($types_res)) {
                        echo 
                            "<tr>
                                <td>".$row['type_id']."</td>
                                <td>".$row['type']."</td>
                            </tr>";
                    }
                
                ?>
        </tbody>
    </table>
	</div>
</body>
</html>