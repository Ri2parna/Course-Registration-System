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
              mysqli_query($database,"DELETE FROM Student WHERE Enrollment_No = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Course deleted !!";
      }

?>






<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Student Data</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<style type="text/css">
  
  html {
    margin: 0;
  }

</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div id="demo">
  <h1>Sudent Data</h1>
  <h2> Last updated <?php print_r(date("Y-m-d")); ?></h2>
  
  <!-- Responsive table starts here -->
  <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
  <div class="table-responsive-vertical shadow-z-1">
  <!-- Table starts here -->
  <table id="table" class="table table-hover table-mc-light-blue">
      <thead>
        <tr>
          <th>#</th>
            <th>Enrollment Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Department</th>
            <th>Semester</th>
            <th>Journal Number</th>
            <th>SGPA</th>
            <th>CGPA</th>
            <th>Category</th>
            <th>Fee Amount</th>
            <th>Options</th>
        </tr>
      </thead>
      <tbody>

 <?php 

    $data = mysqli_query($database,"SELECT * FROM Student");
    $count = 0;
    while($row=mysqli_fetch_array($data))
    {
?>
<tr>
      <tr>
      <td><?php echo $count+1;?></td>
      <td><?php echo htmlentities($row['Enrollment_No']);?></td>
      <td><?php echo htmlentities($row['First_Name']);?></td>
      <td><?php echo htmlentities($row['Last_Name']);?></td>
      <td><?php echo htmlentities($row['Department']);?></td>
      <td><?php echo htmlentities($row['Semester']);?></td>
      <td><?php echo htmlentities($row['Journal_Number']);?></td>
      <td><?php echo htmlentities($row['SGPA']);?></td>
      <td><?php echo htmlentities($row['CGPA']);?></td>
      <td><?php echo htmlentities($row['Category']);?></td>
      <td><?php echo htmlentities($row['Fee_Amount']);?></td>
      <td>
<a href="edit/view.php?id=<?php echo $row['Enrollment_No']?>">
<button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>
<a href="registered_students.php?id=<?php echo $row['Enrollment_No']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
<button class="btn btn-danger">Delete</button></a>
      </td>
</tr>
<?php 
$count++;
} ?>
      </tbody>
    </table>
  </div>
  
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>