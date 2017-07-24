<?php
include ('../db_scripts/LoginDbCall.php');
?>
<html>
<head>
    <!-- All the files that are required -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../files/login_style.css">
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <script src="../files/login_js.js"></script>
    <script>
        function ifWrongDetailsEntered(err_message) {
            $('#status').removeClass('text-center text-info').addClass('text-center text-danger').empty().html("<br>"+err_message);
        }
    </script>
</head>
<body>
<div class="container">
    <!-- ADD WORKER FORM -->
    <div class="text-center" style="padding:50px 0">
        <div class="logo">add workers here</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="forgot-password-form" class="text-left" method="post">
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group"><br>
                            <label for="fp_email" class="sr-only">Unique admin ID</label>
                            <input type="text" class="form-control" id="admin_id" name="adminId" placeholder="Unique admin ID" required="required">
                        </div>
                        <div class="form-group"><br>
                            <label for="fp_email" class="sr-only">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="required">
                        </div>
                        <div class="form-group"><br>
                            <strong>Profession</strong>&nbsp;&nbsp;&nbsp;
                            <select name="profession">
                                <option value="carpenter">Carpenter</option>
                                <option value="plumber">Plumber</option>
                                <option value="washerman">Washerman</option>
                            </select>
                        </div>
                        <div class="form-group"><br>
                            <label for="phone" class="sr-only">(+91-)</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Moblie    (+91-)" maxlength="10" minlength="10" required="required">
                        </div>
                        <div class="form-group"><br>
                            <input type="text" class="form-control" id="address" name="address" placeholder="address" minlength="20" required="required">
                        </div>
                        <div class="form-group"><br>
                            <strong>City</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <select name="city">
                                <option value="nagpur">Select a City </option>
                                <option value="nagpur">Nagpur</option>
                                <option value="delhi">Delhi</option>
                                <option value="mumbai">Mumbai</option>
                                <option value="banglore">Banglore</option>
                                <option value="Pune">Pune</option>
                            </select>
                        </div>
                        <div class="form-group"><br>
                            <input type="text" class="form-control" id="lat" name="latitude" placeholder="Lat (atleast 6 places to dec)" minlength="9" required="required">
                        </div>
                        <div class="form-group"><br>
                            <input type="text" class="form-control" id="lngt" name="logitude" placeholder="Lngt (atleast 6 places to dec)" minlength="9" required="required">
                        </div>
                        <p class="text-center text-info" id="status"><br>
                            You must enter a valid Details
                        </p>
                    </div>
                    <button type="submit" name="save_worker" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>
</div>
<?php
if(isset($_POST['save_worker']))
{
    function checkAdminId()
    {
        $adminId=['imadmin@aditya007','imadmin@vivek004','imadmin@utkarsh005'];
        foreach ($adminId as $admin)
        {
            if(!strcmp($_POST['adminId'],$admin))
            {
                return 1;
            }
            else
                return 0;
        }
    }

    if(checkAdminId())
    {
        $name=$_POST['name'];
        $proffession=$_POST['profession'];
        $mobile=$_POST['phone'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $lat=$_POST['latitude'];
        $lngt=$_POST['logitude'];
        if(LoginDbCall::addWorker($name,$proffession,$mobile,$address,$city,$lat,$lngt))
        {
            ?>
            <script>alert('Worker is added successfully')</script>
            <?php
        }
        else
        {
            ?>
        <script>ifWrongDetailsEntered('Worker details could not be added,please try again')</script>
            <?php
        }
    }
    else{
        ?>
        <script>ifWrongDetailsEntered('You are not authorized as an Admin')</script>
<?php
    }
}
?>
</body>
</html>