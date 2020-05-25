<?php
error_reporting(0);
include("auth.php"); //include auth.php file on all secure pages ?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="../css/style_php.css" />
</head>
<body>
<div class="form">
&nbsp;
<h1>Welcome <?php echo $_SESSION['username']; ?>!</h1>



<?php
include("dashboard.php");?>



<br /><br /><br /><br />

</body>
</html>
