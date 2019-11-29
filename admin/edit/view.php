
<?php 

session_start();

include('../../includes/config.php');

if(isset($_GET['id']))
{
    $Enrollment_No = $_GET['id'];

    $data = mysqli_query($database,"SELECT * from Student where Enrollment_No = '$Enrollment_No'");
    $query = mysqli_fetch_assoc($data);
}

else
{
    header('location: ../registered_students.php');
}

if(isset($_POST['submit']))

{
 
  if(isset($_POST['First_Name'])){$First_Name = $_POST['First_Name'];}
  if(isset($_POST['Last_Name'])){$Last_Name = $_POST['Last_Name'];}
  if(isset($_POST['Department'])){$Department = $_POST['Department'];}
  if(isset($_POST['SGPA'])){$SGPA = $_POST['SGPA'];}
  if(isset($_POST['CGPA'])){$CGPA = $_POST['CGPA'];}
  if(isset($_POST['Category'])){$Category = $_POST['Category'];}
  if(isset($_POST['Semester'])){$Semester = $_POST['Semester'];}
  if(isset($_POST['Phone'])){$Phone = $_POST['Phone'];}
  if(isset($_POST['Fee_Amount'])){$Fee_Amount = $_POST['Fee_Amount'];}
  if(isset($_POST['Journal_Number'])){$Journal_Number = $_POST['Journal_Number'];}

$update_query = mysqli_query($database,"UPDATE `Student` SET `First_Name` = '$First_Name', `Last_Name` = '$Last_Name', `Department` = '$Department', `Semester` = '$Semester', `SGPA` = '$SGPA', `CGPA` = '$CGPA', `Category` = '$Category',`Fee_Amount` = '$Fee_Amount',`Journal_Number` = '$Journal_Number' WHERE `Student`.`Enrollment_No` = '$Enrollment_No' ");

if($update_query)
{
$_SESSION['msg']="Student Record updated Successfully !!";
}
else
{
  $_SESSION['$msg']="Error : Student Record not update";
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
    <title>Admin Panel // Edit Registration</title>

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
    if (confirm("Are you sure you want to submit the form?")) 
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
                    <h2 class="title">Enrollment No: <?php print_r($_GET['id']) ?> </h2>
                </div>
                <div class="card-body">
                    <form name="admin" method="post">
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <!-- <div class="value"> -->
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="Enrollment_Number" value="<?php echo htmlentities($query['First_Name']);?>" required="">
                                            <label class="label--desc"value="<?php echo htmlentities($query['First_Name']);?>" required="">First name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="Enrollment_Number" value="<?php echo htmlentities($query['Last_Name']);?>" required="">
                                            <label class="label--desc" value="<?php echo htmlentities($query['Last_Name']);?>">Last name</label>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>

                        <div class="form-row">
                            <div class="name">Enrollment Number</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Enrollment_Number" value="<?php echo htmlentities($Enrollment_No);?>" required="">
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Department</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Department" value="<?php echo htmlentities($query['Department']);?>" required="">      
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Semester</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Semester" value="<?php echo htmlentities($query['Semester']);?>" required="">      
                                </div>
                            </div>
                        </div>


                        <div class="form-row m-b-55">
                            <div class="name">Grades</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="SGPA" value="<?php echo htmlentities($query['SGPA']);?>" required="">
                                            <label class="label--desc">SGPA</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="CGPA"value="<?php echo htmlentities($query['CGPA']);?>" required="">
                                            <label class="label--desc">CGPA</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Journal Number</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Journal_Number" value="<?php echo htmlentities($query['Journal_Number'])?>" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Fee Amount: </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="Number" name="Fee_Amount" value="<?php echo htmlentities($query['Fee_Amount']);?>" required="">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Category</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Phone" value="<?php echo htmlentities($query['Category']) ?>" required="">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Subject 1</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Phone" value="Okay Boomer" required="">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Subject 2</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Phone" value="Okay Boomer" required="">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Subject 3</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Phone" value="Okay Boomer" required="">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Subject 4 </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Phone" value="Okay Boomer" required="">
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
    <script src="../others/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

<!-- ///////////////////////// -->
