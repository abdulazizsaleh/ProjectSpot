<!DOCTYPE html>
<html>
<body>

<?php
/*

 -- The database connection might be removed from here --

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbn = "viewImg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbn);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
echo "Connected successfully -- ";
}

*/

//-------------------------------------------------------------------

// below is a query that selects all attributes from the mentioned database which are images 
// and loop through the whole records to display all the images 

$qry = "SELECT * FROM news";
$result = mysqli_query($conn , $qry);

while($row = mysqli_fetch_array($result)){
	echo '<img src="data:image;base64,'.base64_encode($row['images']).'"/>';
}

mysqli_close($conn);
?>


</body>
</html>