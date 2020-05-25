<?php


 
require('db.php');
include("auth.php"); //include auth.php file on all secure pages
include ("book.php"); ?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="../css/style_php.css" />
</head>
<body>

	<style type="text/css">
.t{
 
  height: 100px;
  width: 1000px;
  text-align: left;
  margin: 100px -350px;

  
}

td {
  height: 50px;
  width: 100px;
  vertical-align: bottom;
}

th, td {
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
<div class="form t">
<h1><center>Appointment Details</center></h1>
<?php

$name= $_SESSION['username'];
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "book");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



if($name == 'admin'){

	// Attempt select query execution
	$sql = "SELECT * FROM book";
	if($result = mysqli_query($link, $sql)){
	    if(mysqli_num_rows($result) > 0){
	        echo "<table>";
	            echo "<tr>";
	                echo "<th>Name</th>";
	                echo "<th>Phone</th>";
	                echo "<th>Email</th>";
	                echo "<th>Date</th>";
	                echo "<th>City</th>";
	                echo "<th>Time</th>";
	                echo "<th>Address</th>";
	            echo "</tr>";
	        while($row = mysqli_fetch_array($result)){
	            echo "<tr>";
	                echo "<td>" . $row['name']. "</td>";
	                echo "<td>" . $row['phone'] . "</td>";
	                echo "<td>" . $row['email'] . "</td>";
	                echo "<td>" . $row['date'] . "</td>";
	                echo "<td>" . $row['city'] . "</td>";
	                echo "<td>" . $row['time'] . "</td>";
	                echo "<td>" . $row['address'] . "</td>";
	            echo "</tr>";
	        }
	        echo "</table>";
	        // Free result set
	        mysqli_free_result($result);
	    } else{
	        echo "<br><center>"."No Appointments currently made.."."<br>";
	    }
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}

}
 else{
	// Attempt select query execution
	$sql = "SELECT * FROM book where name='$name'";
	if($result = mysqli_query($link, $sql)){
	    if(mysqli_num_rows($result) > 0){
	        echo "<table>";
	            echo "<tr>";
	                echo "<th>Name</th>";
	                echo "<th>Phone</th>";
	                echo "<th>Email</th>";
	                echo "<th>Date</th>";
	                echo "<th>City</th>";
	                echo "<th>Time</th>";
	                echo "<th>Address</th>";
	            echo "</tr>";
	        while($row = mysqli_fetch_array($result)){
	            echo "<tr>";
	               echo "<td>" . $row['name'] . "</td>";
	                echo "<td>" . $row['phone'] . "</td>";
	                echo "<td>" . $row['email'] . "</td>";
	                echo "<td>" . $row['date'] . "</td>";
	                echo "<td>" . $row['city'] . "</td>";
	                echo "<td>" . $row['time'] . "</td>";
	                echo "<td>" . $row['address'] . "</td>";
	            echo "</tr>";
	        }
	        echo "</table>";
	        // Free result set
	        mysqli_free_result($result);
	    } else{
	        echo "<br><center>"."No Appointments currently made.."."<br>";
	    }
	} else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
} 
// Close connection
mysqli_close($link);
?>

&nbsp;


<h2><a href="logout.php"><center>Logout</a></h2>


<br /><br /><br /><br />

</div>
</body>
</html>
