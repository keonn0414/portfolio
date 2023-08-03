
<?php
date_default_timezone_set("ASIA/MANILA");
/*if (session_start())
{
    session_destroy();
}*/
if(session_status() == PHP_SESSION_NONE){session_start();}
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
#var_dump($_SESSION);
if(!empty($_SESSION) && isset($_SESSION['signed_in']) && $_SESSION['signed_in'] === false && !isset($_SESSION['logout'])){
    if(isset($_POST['btnsubmit']))
    {
        //$errors = array(); /* declare the array for later use */

        if(empty($_POST['uname']) || empty($_POST['pword']))
        {
            $errors = 'Please fill all fields.';
        }
        else
        {
            $result = mysqli_query($conn,"SELECT
                     * FROM
                        tbl_users
                    WHERE
                        emp_id='" . mysqli_real_escape_string($conn,$_POST['uname']) . "'
                    AND
                        pword='" . sha1($_POST['pword']) . "'"); //
            if(!$result)
            {
                $errors = 'Something went wrong while signing in. Please try again.';
            }
            else
            {
                    if(mysqli_num_rows($result) == 0)
                        {
                            $errors = 'You have supplied a wrong user/password combination. Please try again.';

                        }
                        else {

                            $_SESSION['signed_in'] = true;
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $_SESSION['Emp_id']    = $row['emp_id'];
                                $_SESSION['Emp_pos']  = $row['position'];
                                $_SESSION['Emp_name'] = ucwords($row['fname']) . ' ' . ucfirst($row['mname']) . ' ' . ucwords($row['lname']);
                            //     $_SESSION['sgod_email']  = $row['user_email'];
                            //     $_SESSION['sgod_fullname']  = $row['user_fname'] . " " . $row['user_mname'] . " " . $row['user_lname'];
                            //     $_SESSION['sgod_dept'] = $row['user_department'];
                            //     $_SESSION['sgod_image'] = $row['user_image'];
                            //     $_SESSION['sgod_position'] = $row['user_position'];
                            
                            



                            }
                            $conn->query("INSERT INTO tbl_logs 
                            (
                            name,
                            position,
                            event,
                            transaction_date
                            ) VALUES (
                            '" . mysqli_real_escape_string($conn,$_SESSION['Emp_name']) . "',
                            '" . mysqli_real_escape_string($conn,$_SESSION['Emp_pos']) . "',
                            '" . mysqli_real_escape_string($conn,'Login') . "',
                            '" . mysqli_real_escape_string($conn,date("Y/m/d h:i:sa")) . "'
                            )");
                            header("location: /main.php");

                        }



            }
        }
    }
} else {
    session_destroy();
    session_start();
    $_SESSION['signed_in'] = false;
}
?><html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
            <link rel="shortcut icon" href="images/bjmp-logo.png" type="image/png" />
            <title>Bureau of Jail Management and Penology</title>
                <link rel="stylesheet" href="/css/bootstrap.min.css">
                <script src="/js/jquery.min.js"></script>
                <script src="/js/bootstrap.min.js"></script>
                <link rel="stylesheet" href="/css/bootstrap-select.css">
                <script src="/js/bootstrap-select.js"></script>
            <style type="text/css">
            @font-face {
                            font-family: mainFont;
                            src: url(fonts/Amble-Light.ttf);
                        }
            #hhh{
                background-image: linear-gradient(to top, #dfe9f3 0%, white 100%);

            }
            body{
                font-family: mainFont;
                background: url('images/BJMP_BG1.png') no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
            #panelh{
                background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
                color: white
            }
            .vcenter {
                display: inline-block;
                vertical-align: middle;
                float: none;
            }
            </style>
    </head>

    <body style="overflow-x: hidden;">
    <form class="form-vertical" method="Post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >
    <div class="container-fluid text-center" style="margin-top: 20px; width: 100%; border-color: black; " >
        <div class="row content" >
            <div class="col-sm-4"></div>
            <div class="col-sm-4 ">
                <div class="panel-group " >
                    <div class="panel panel-default" id="hhh" >
                        <div class="panel-heading" id="panelh" >
                            <h3 style="text-align:left;">Enter your login credentials:</h3>
                        </div>
                            <img src="images/bjmp-logo.png" style="margin-top: 20px; ">
                            <!-- <hr style="display: block;
                                       margin-top: 1em;
                                       margin-bottom: 1em;
                                       margin-left: 1em;
                                       margin-right: 1em;
                                       border-color: #5b5b5b;
                                       border-width: 2px;"> -->
                            <form class="form-group-lg" style="margin: 20px;" >
                            <div class="col-sm-12" style="margin-top: 20px;">
                              <div class="form-group" style="text-align: left; font-size: 20px; ">
                                  
                                  <label for="uname">Username:</label>
                                  <input type="text" class="form-control" id="uname" name="uname">
                                  
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group" style="text-align: left; font-size: 20px; ">
                                  
                                  <label for="pword">Password:</label>
                                  <input type="password" class="form-control" id="pword" name="pword">
                                  
                              </div>
                            </div>
                              <?php if (isset($errors)) {?>
                                    <div class="form-group" style="color:red;">
                                            <h5>
                                                <i> <?php echo $errors; ?></i>
                                            </h5>
                                    </div>
                                    <?php } ?>
                              <div class="form-group" >
                                  <button type="submit" name="btnsubmit" class="btn btn-primary btn-lg" style="width: 35%; ">Log-in</button>
                              </div>
                            </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    </form>
    </body>
<html>
