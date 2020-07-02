
<?php
define('DB_SERVER','localhost');
define('DB_USER','b5f4f6353381bc');
define('DB_PASS' ,'9b84e03e');
define('DB_NAME','TU_Student_Data');
$database = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
