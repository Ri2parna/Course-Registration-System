
<?php 

session_start();

include('../includes/config.php');

if(isset($_SESSION['Enrollment_No']))
{
    $Enrollment_No = $_SESSION['Enrollment_No'];
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
  $Phone = $_POST['Phone'];
  $Fee_Amount = $_POST['Fee_Amount'];
  $Journal_Number = $_POST['Journal_Number'];

// $update_query = mysqli_query($database,"UPDATE `Student` SET `Last_Name` = 'dadd' WHERE `Student`.`Enrollment_No` = 'CSB17074' ");


  $update_query = mysqli_query($database,"UPDATE `Student` SET `First_Name` = '$First_Name', `Last_Name` = '$Last_Name', `Department` = '$Department', `Semester` = '$Semester', `SGPA` = '$SGPA', `CGPA` = '$CGPA', `Category` = '$Category',`Fee_Amount` = '$Fee_Amount',`Journal_Number` = '$Journal_Number' WHERE `Student`.`Enrollment_No` = '$Enrollment_No' ");

if($update_query)
{
$_SESSION['msg']="Student Record updated Successfully !!";
}
else
{
  $_SESSION['$msg']="Error : Student Record not update";
}


header('location: dashboard.php');
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
    <title>Student Panel // Registration</title>

    <!-- Icons font CSS-->
    <link href="../others/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../others/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../others/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../others/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../others/css/main.css" rel="stylesheet" media="all">

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
                    <h2 class="title">Course Registration form </h2>
                    <div class="title"> <?php if(isset($update_query)){print_r($_SESSION['msg']);} ?> </div>
                </div>
                <div class="card-body">
                    <form name="admin" method="post">
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <!-- <div class="value"> -->
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="First_Name" required="">
                                            <label class="label--desc">First name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="Last_Name" required="">
                                            <label class="label--desc">Last name</label>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>

                        <div class="form-row">
                            <div class="name">Enrollment Number</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Enrollment_Number" value="<?php echo htmlentities($Enrollment_No);?>" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Department</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Department" required="">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <?php 

                                            $subject_query = mysqli_query($database,"SELECT DISTINCT Department From Subjects");

                                            $count = -1;
                                            while($row=mysqli_fetch_array($subject_query))
                                            {
                                             ?>
                                             <option><?php print_r($row[$count]) ?></option>

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
                            <div class="name">Semester</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Semester">
                                            <option  disabled="disabled" selected="selected">Choose option</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-row m-b-55">
                            <div class="name">Grades</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" step="0.01" name="SGPA" min="1" max="10" required="">
                                            <label class="label--desc">SGPA</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" step="0.01" name="CGPA" min="1" max="10" required="">
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
                                    <input class="input--style-5" type="text" name="Journal_Number" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Fee Amount: </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Fee_Amount" required="">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Phone" required="">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Category: </div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="Category" required="">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Gen</option>
                                            <option>OBC</option>
                                            <option>SC/ST/pwd    </option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Subject 1</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject" required="">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <?php 

                                            $subject_query = mysqli_query($database,"SELECT DISTINCT Course_Code From Subjects");

                                            $count = 0;
                                            while($row=mysqli_fetch_array($subject_query))
                                            {
                                             ?>
                                             <option><?php print_r($row[$count]) ?></option>

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
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <?php 

                                            $subject_query = mysqli_query($database,"SELECT DISTINCT Course_Code From Subjects");

                                            $count = 0;
                                            while($row=mysqli_fetch_array($subject_query))
                                            {
                                             ?>
                                             <option><?php print_r($row[$count]) ?></option>

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
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <?php 

                                            $subject_query = mysqli_query($database,"SELECT DISTINCT Course_Code From Subjects");

                                            $count = 0;
                                            while($row=mysqli_fetch_array($subject_query))
                                            {
                                             ?>
                                             <option><?php print_r($row[$count]) ?></option>

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
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <?php 

                                            $subject_query = mysqli_query($database,"SELECT DISTINCT Course_Code From Subjects");

                                            $count = 0;
                                            while($row=mysqli_fetch_array($subject_query))
                                            {
                                             ?>
                                             <option><?php print_r($row[$count]) ?></option>

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
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <?php 

                                            $subject_query = mysqli_query($database,"SELECT DISTINCT Course_Code From Subjects");

                                            $count = 0;
                                            while($row=mysqli_fetch_array($subject_query))
                                            {
                                             ?>
                                             <option><?php print_r($row[$count]) ?></option>

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
                        <!-- <div class="form-row p-t-20">
                            <label class="label label--block">Do you confirm your inputs ?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" checked="checked" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> -->
                        <div>
                            <button name="submit" class="btn btn--radius-2 btn--red" onClick="return confSubmit(this.form);"  type="submit">Submit ?</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="../others/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="../others/vendor/select2/select2.min.js"></script>
    <script src="../others/vendor/datepicker/moment.min.js"></script>
    <script src="../others/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="../others/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->