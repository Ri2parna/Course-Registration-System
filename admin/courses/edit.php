<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME','TU_Student_Data');
$database = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_GET['del']))
      {
              mysqli_query($database,"DELETE FROM Subjects WHERE Course_Code = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Course deleted !!";
      }

?>
 

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Registered Students</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style.css">

<style type="text/css">
  
  .options {
    display: flex;
  }

</style>

</head>
<body>

<section>
  <!--for demo wrap-->
  <h1>Courses</h1>


   <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
            <th>#</th>
            <th>Department</th>
            <th>Course Code</th>
            <th>Couse Title</th>
            <th>Course Credits</th>
            <th>Options</th>
        </tr>
      </thead>
    </table>
  </div>

    <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
 <?php 

    $data = mysqli_query($database,"SELECT * FROM Subjects");
    $count = 0;
    while($row=mysqli_fetch_array($data))
    {
?>
      <tr>
      <tr>
      <td><?php echo $count+1;?></td>
      <td><?php echo htmlentities($row['Department']);?></td>
      <td><?php echo htmlentities($row['Course_Code']);?></td>
      <td><?php echo htmlentities($row['Course_Title']);?></td>
      <td><?php echo htmlentities($row['Course_Credit']);?></td>
      <td>
<a href="edit-course.php?id=<?php echo $row['Course_Code']?>">
<button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>
<a href="edit.php?id=<?php echo $row['Course_Code']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
<button class="btn btn-danger">Delete</button></a>
      </td>
</tr>
<?php 
$count++;
} ?>
      </tbody>
    </table>
  </div>
</section>



<!-- follow me template -->
<div class="made-with-love">
  Made with
  <i>♥</i>
</div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>