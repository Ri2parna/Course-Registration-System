<?php 
session_start();
 ?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link rel='stylesheet' href='https://codepen.io/jouanmarcel/pen/qBBawwv.css'><link rel="stylesheet" href="../others/style.css">
  <style type="text/css">
    a {
      text-decoration: none;
      color: inherit;
    }
    body {
      background: url("https://scontent-lht6-1.cdninstagram.com/v/t51.2885-15/e35/27580138_153723535424914_4558334200964448256_n.jpg?_nc_ht=scontent-lht6-1.cdninstagram.com&_nc_cat=110&se=7&oh=343d748e48b21639d1935e345044550d&oe=5E10748A&ig_cache_key=MTcxMDYwNTAzMjU5MTY3MDU1OQ%3D%3D.2");
      background-repeat: no-repeat;
      background-size: cover;
    }
    .ste {
      border-radius: 2vh 2vh;
      display: flex;
      flex-flow: column;
      align-items: space-around;
      justify-content: center;
      background: white;

    }
    .ste * {
      padding: 3vh;
    }
    .container
    {
      opacity: 100%;
      padding: 10vh;
      display: flex;
    }
    button{
      margin: 2vh;
    }
    h2 {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    h3 {
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="ste">
  <div><h2>Admin Panel</h2></div>
  <div><h3><?php if(isset($_SESSION['msgr'])){print_r($_SESSION['msgr']);} ?></h3></div>
  <div class="container">
    <button><span><a href="newstudent.php">New</a></span></button>
  <button><span><a href="add_course.php">Add</a></span></button>
  <button><span><a href="courses/edit.php">Course</a></span></button>
  <button><span><a href="registered_students.php">Student</a></span></button>
  </div>
</div>
<!-- partial -->

</body>
</html>