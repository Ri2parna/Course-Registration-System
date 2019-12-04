<?php 

session_start();
unset($_SESSION['msg']);
include('../../includes/config.php');

if(isset($_GET['id']))
{
    $course = $_GET['id'];
	$query = mysqli_query($database,"SELECT * from Subjects WHERE Course_Code='$course'");
	$values = mysqli_fetch_assoc($query);
}
else
{
	header('location: edit.php');
}

if(isset($_POST['submit']))

{
 
  $Department = $_POST['Department'];
  $Course_Code = $_POST['Course_Code'];
  $Course_Title = $_POST['Course_Title'];
  $Course_Credit = $_POST['Course_Credit'];

$update_query = mysqli_query($database,"UPDATE `Subjects` SET `Department` = '$Department', `Course_Code` = '$Course_Code', `Course_Title` = '$Course_Title', `Course_Credit` = '$Course_Credit' WHERE `Subjects`.`Department` = '$Department' AND `Subjects`.`Course_Code` = '$Course_Code' ");


if($update_query)
{
    $_SESSION['msg']="Updated Subjects !!";
}
else
{
    $_SESSION['msg']="Error : Subjects coudn't be Updated.";
}



}




 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Admin Panel // Add Course</title>

    <!-- Icons font CSS-->
    <link href="../../others/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../../others/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../../others/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../others/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../others/css/main.css" rel="stylesheet" media="all">

    <script type="text/javascript">

    function confSubmit(form) {
    if (confirm("Are you sure you want to Add the Course?")) 
    {
        form.submit();
    }
    else
    {
        return false;
    }
    }


    </script>

    <style>
        .page-wrapper{
            background: url("https://images.shiksha.com/mediadata/images/1510913480phpWe7tYs.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>



</head>

<body>

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Edit Course</h2>
                    <div class="title"><?php

                        if(isset($_SESSION['msg']))
                        {
                            print_r($_SESSION['msg']);
                        }

                     ?>
                </div>
                <div class="card-body">
                    <form name="admin" method="post">
                        <div class="form-row m-b-55">
                            <div class="name">Course Details</div>
                            <!-- <div class="value"> -->
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="Course_Title" value="<?php print_r($values['Course_Title']) ?>" required="">
                                            <label class="label--desc">Course Name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="Course_Code" value="<?php print_r($values['Course_Code']) ?>" required="">
                                            <label class="label--desc">Course Code</label>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>


                                                <div class="form-row">
                            <div class="name">Department</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Department" required="">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <?php 

                                            $subject_query = mysqli_query($database,"SELECT DISTINCT department from Subjects");


                                            $count = 0;
                                            while($row=mysqli_fetch_array($subject_query))
                                            {
                                             ?>
                                             <option><?php print_r($row[0]) ?></option>

                                             <?php 
                                                $count++;
                                            } 
                                            ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        
                        <div class="form-row">
                            <div class="name">Course Credits</div>
                        <div class="col-2">
                                        <div class="input-group-desc">
                                        <input class="input--style-5" type="text" name="Course_Credit" value="<?php print_r($values['Course_Credit']) ?>" required="">
                                        </div>
                                    </div>
                                </div>  
                        <div>
                            <button name="submit" class="btn btn--radius-2 btn--red" onClick="return confSubmit(this.form);"  type="submit">Submit ?</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>

    <!-- Jquery JS-->
    <script src="../../others/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="../../others/vendor/select2/select2.min.js"></script>
    <script src="../../others/vendor/datepicker/moment.min.js"></script>
    <script src="../../others/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="../../others/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->