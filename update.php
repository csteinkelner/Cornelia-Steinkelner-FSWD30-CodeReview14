<?php
require_once 'actions/db_connect.php';


if($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `events`
                    LEFT JOIN address ON events.fk_address_id = address.address_id
                    LEFT JOIN event_date ON events.fk_date_id = event_date.date_id
                    LEFT JOIN event_type ON events.fk_event_type_id = event_type.type_id";
    $result = $conn->query($sql);

    $data = $result->fetch_assoc();

    $conn->close();

    require_once 'parts/head.php';

?>
 
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
        <form action="actions/a_update.php" method="post">
        <table cellspacing="0" cellpadding="0" class="table">
            
            <tr>
                <th>Name</th>
                <td><input type="text" name="name" placeholder="name" value="<?php echo $data['name'] ?>" /></td>
            </tr>
            <tr>
                <th>Startdate</th>
                <td><input type="text" name="start_date" placeholder="start_date" value="<?php echo $data['start_date'] ?>" /></td>
            </tr>
            <tr>
                <th>Enddate</th>
                <td><input type="text" name="end_date" placeholder="end_date" value="<?php echo $data['end_date'] ?>" /></td>
            </tr>
            <tr>
                <th>description</th>
                <td><input type="text" name="description" placeholder="description" value="<?php echo $data['description'] ?>" /></td>
            </tr>
            <tr>
                <th>Image</th>
                <td><input type="text" name="image" placeholder="please enter a link or file" value="<?php echo $data['image'] ?>" /></td>
            </tr>
            <tr>
                <th>Capacity</th>
                <td><input type="text" name="capacity" placeholder="capacity" value="<?php echo $data['capacity'] ?>" /></td>
            </tr> 
            <tr>
                <th>Contact Email</th>
                <td><input type="text" name="email" placeholder="email" value="<?php echo $data['contact_email'] ?>" /></td>
            </tr> 
            <tr>
                <th>Contact Phonenumber</th>
                <td><input type="text" name="phonenumber" placeholder="phonenumber" value="<?php echo $data['contact_phonenumber'] ?>" /></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><input type="text" name="location" placeholder="Location" value="<?php echo $data['location'] ?>" /></td>
                <td><input type="text" name="street" placeholder="Street and number" value="<?php echo $data['street'] ?>" /></td>
                <td><input type="text" name="postal_code" placeholder="Postal Code" value="<?php echo $data['postal_code'] ?>" /></td>
                <td><input type="text" name="city" placeholder="City" value="<?php echo $data['city'] ?>" /></td>
            </tr>
            <tr>
                <th>URL</th>
                <td><input type="text" name="ulr" placeholder="url" value="<?php echo $data['url'] ?>" /></td>
            </tr> 
            <tr>
                <th>Type</th>
                <td><input type="text" name="type" placeholder="type" value="<?php echo $data['fk_event_type_id'] ?>" /></td>
            </tr> 
            <tr>
                <input type="hidden" name="id" value="<?php echo $data['id']?>" />
                <td><button type="submit" class="btn">Save Changes</button></td>
                <td><a href="home.php"><button type="button" class="btn">Back</button></a></td>
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
            <?php  if($result->num_rows > 0) { //für admin
                    while($row = $result->fetch_assoc()) {
                            echo "<tr>
                            <td>".$row['type_id']."</td>
                            <td>".$row['type']."</td>
                        </tr>";
                    }
                }else {
                    echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
                }
                ?>
        </tbody>
    </table>
    </div>
    
    
</body>
</html>

<?php
}
?>

