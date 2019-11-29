
<?php 

session_start();

include('../includes/config.php');

if(isset($_SESSION['Enrollment_No']))
{
    $Enrollment_No = $_SESSION['Enrollment_No'];

    $data = mysqli_query($database,"SELECT * from Student where Enrollment_No = '$Enrollment_No'");
    $query = mysqli_fetch_assoc($data);
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
    <title>Student View // Details</title>

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
                    <h2 class="title">View Data </h2>
                </div>
                <div class="card-body">
                    <form name="admin" method="post">
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <!-- <div class="value"> -->
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="Enrollment_Number" value="<?php echo htmlentities($query['First_Name']);?>" readonly>
                                            <label class="label--desc"value="<?php echo htmlentities($query['First_Name']);?>" readonly>First name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="Enrollment_Number" value="<?php echo htmlentities($query['Last_Name']);?>" readonly>
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
                                    <input class="input--style-5" type="text" name="Enrollment_Number" value="<?php echo htmlentities($Enrollment_No);?>" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Department</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Department" value="<?php echo htmlentities($query['Department']);?>" readonly>      
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Semester</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Semester" value="<?php echo htmlentities($query['Semester']);?>" readonly>      
                                </div>
                            </div>
                        </div>


                        <div class="form-row m-b-55">
                            <div class="name">Grades</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="SGPA" value="<?php echo htmlentities($query['SGPA']);?>" readonly>
                                            <label class="label--desc">SGPA</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="CGPA"value="<?php echo htmlentities($query['CGPA']);?>" readonly>
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
                                    <input class="input--style-5" type="text" name="Journal_Number" value="<?php echo htmlentities($query['Journal_Number'])?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Fee Amount: </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Fee_Amount" value="<?php echo htmlentities($query['Fee_Amount']);?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Category</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="Phone" value="<?php echo htmlentities($query['Category']) ?>" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Subject : </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" value="<?php print_r($query['Subject_1']) ?>" name="Journal_Number" required="" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Subject : </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" value="<?php print_r($query['Subject_2']) ?>" name="Journal_Number" required="" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Subject : </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" value="<?php print_r($query['Subject_3']) ?>" name="Journal_Number" required="" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="name">Subject : </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" value="<?php print_r($query['Subject_4']) ?>" name="Journal_Number" required="" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Subject : </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" value="<?php print_r($query['Subject_5']) ?>" name="Journal_Number" required="" readonly>
                                </div>
                            </div>
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