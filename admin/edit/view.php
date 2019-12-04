
<?php 

session_start();

include('../../includes/config.php');

if(isset($_GET['id']))
{
    $Enrollment_No = $_GET['id'];

    $data = mysqli_query($database,"SELECT * FROM Student WHERE Enrollment_No='$Enrollment_No'");
    $query = mysqli_fetch_assoc($data);
}

else
{
    header('location: ../registered_students.php');
}

if(isset($_POST['submit']))

{
 
  $First_Name = $_POST['First_Name'];
  $Last_Name = $_POST['Last_Name'];
  $Department = $_POST['Department'];
  $SGPA = $_POST['SGPA'];
  $CGPA = $_POST['CGPA'];
  $Category = $_POST['Category'];
  $Semester = $_POST['Semester'];
  $Fee_Amount = $_POST['Fee_Amount'];
  $Journal_Number = $_POST['Journal_Number'];
  $Subject_1 = $_POST['Subject_1'];
  $Subject_2 = $_POST['Subject_2'];
  $Subject_3 = $_POST['Subject_3'];
  $Subject_4 = $_POST['Subject_4'];
  $Subject_5 = $_POST['Subject_5'];


$update_query = mysqli_query($database,"UPDATE `Student` SET  `First_Name` = '$First_Name', `Last_Name` = '$Last_Name', `Department` = '$Department', `Journal_Number` = '$Journal_Number', `Category` = '$Category', `Subject_1` = '$Subject_1', `Subject_2` = '$Subject_2', `Subject_3` = '$Subject_3', `Subject_4` = '$Subject_4', `Subject_5` = '$Subject_5' WHERE `Student`.`Enrollment_No` = '$Enrollment_No';");

if($update_query)
{
$_SESSION['msg']="Student Record updated Successfully !!";
header('location: ../admin_panel.php');
}
else
{
  $_SESSION['msg']="Error : Student Record not update";
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
                                            <input class="input--style-5" type="text" name="First_Name" value="<?php if(isset($query['First_Name'])){print_r($query['First_Name']);} ?>" required="">
                                            <label class="label--desc"value="" required="">First name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="Last_Name" value="<?php echo htmlentities($query['Last_Name']);?>" required="">
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
                                    <input class="input--style-5" type="text" name="Enrollment_Number" value="<?php echo htmlentities($Enrollment_No);?>" pattern="[A-Z]+[0-9]+" required="">
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Department</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Department" value="<?php echo htmlentities($query['Department']);?>" pattern="[A-Z]+[a-z0-9]*" required="">      
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Semester</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="Number" name="Semester" value="<?php echo htmlentities($query['Semester']);?>" max="14" required="">      
                                </div>
                            </div>
                        </div>


                        <div class="form-row m-b-55">
                            <div class="name">Grades</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="SGPA" value="<?php echo htmlentities($query['SGPA']);?>" required="" max="10">
                                            <label class="label--desc">SGPA</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="CGPA"value="<?php echo htmlentities($query['CGPA']);?>" required="" max="10">
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
                                    <input class="input--style-5" type="number" name="Fee_Amount" value="<?php echo htmlentities($query['Fee_Amount']);?>" min="111" max="99999" required="">
                                </div>
                            </div>
                        </div>







                        <div class="form-row">
                            <div class="name">Category</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Category" value="<?php echo htmlentities($query['Category']) ?>" required="">
                                </div>
                            </div>
                        </div>



                        <div class="form-row">
                            <div class="name">Subject 1</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Subject_1" required="">
                                            <option disabled="disabled" selected="selected"><?php print_r($query['Subject_1']) ?></option>
                                            <?php 

                                            $subject_query = mysqli_query($database,"SELECT DISTINCT Course_Code from Subjects");


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
                            <div class="name">Subject 2</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Subject_2" required="">
                                            <option disabled="disabled" selected="selected"><?php print_r($query['Subject_2']) ?></option>
                                            <?php 

                                            $subject_query = mysqli_query($database,"SELECT DISTINCT Course_Code from Subjects");


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
                            <div class="name">Subject 3</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Subject_3" required="">
                                            <option disabled="disabled" selected="selected"><?php print_r($query['Subject_3']) ?></option>
                                            <?php 

                                            $subject_query = mysqli_query($database,"SELECT DISTINCT Course_Code from Subjects");


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
                            <div class="name">Subject 4</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Subject_4" required="">
                                            <option disabled="disabled" selected="selected"><?php print_r($query['Subject_4']) ?></option>
                                            <?php 

                                            $subject_query = mysqli_query($database,"SELECT DISTINCT Course_Code from Subjects");


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
                            <div class="name">Subject 5</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Subject_5" required="">
                                            <option disabled="disabled" selected="selected"><?php print_r($query['Subject_5']) ?></option>
                                            <?php 

                                            $subject_query = mysqli_query($database,"SELECT DISTINCT Course_Code from Subjects");


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

<!-- ///////////////////////// -->
