
<?php
$database = mysqli_connect($_ENV["DB_SERVER"],$_ENV["DB_USER"],$_ENV["DB_PASS"],$_ENV["DB_NAME"]);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
