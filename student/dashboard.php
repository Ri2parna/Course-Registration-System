<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Student Control Panel</title>
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
      padding: 20vh;
      display: flex;
    }
  </style>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="ste">
  <div><h2>Student Dashboard</h2></div>
  <div class="container">
  <button><span><a href="register.php">Register</a></span></button>
  <button><span><a href="view.php">View</a></span></button>
  <button><span><a href="logout.php">Logout</a></span></button>
  </div>
</div>
<!-- partial -->

</body>
</html>