<?php

require_once 'actions/db_connect.php';

if($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM events WHERE id = {$id}";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

    $conn->close();
?>

<?php 
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
        <h3>Do you really want to delete this event?</h3>

    <form action="actions/a_delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
        <button type="submit">Yes, delete it!</button>
        <a href="home.php"><button type="button">No, go back!</button></a>
    </form>
    </div>

</body>
</html>

<?php
}
?>