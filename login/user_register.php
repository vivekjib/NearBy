<?php
include ('db_scripts/LoginDbCall.php');
?>
<html>
<head>
    <!-- All the files that are required -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="files/login_style.css">
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <script src="files/login_js.js"></script>
    <script>
        function ifWrongDetailsEntered(err_message) {
            $('#status').removeClass('text-center text-info').addClass('text-center text-danger').empty().html("<br>"+err_message);
        }
    </script>
</head>
<body>
<div class="container">
    <!-- REGISTRATION FORM -->
    <div class="text-center" style="padding:50px 0">
        <div class="logo">register</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="register-form" class="text-left" method="post">
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="reg_username" class="sr-only">Name</label>
                            <input type="text" class="form-control" id="reg_username" name="reg_name" placeholder="Full Name" required="required">
                        </div>
                        <div class="form-group">
                            <label for="reg_password" class="sr-only">Password</label>
                            <input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password" required="required">
                        </div>
                        <div class="form-group">
                            <label for="reg_email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="reg_email" name="reg_username" placeholder="email (xxx@example.com)" required="required">
                        </div>
                        <div class="form-group login-group-checkbox">
                            <input type="checkbox" class="" id="reg_agree" name="reg_agree">
                            <label for="reg_agree">i agree with <a href="#">terms</a></label>
                        </div>
                        <p class="text-center text-info" id="status"><br>
                            You must enter a valid Email Id
                        </p>
                    </div>
                    <button type="submit" name="register_button" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <p>already have an account? <a href="index.php">login here</a></p>
                    <br><br>
                    <p>
                        <a href="../">
                            <strong>
                                Go Back &nbsp;&nbsp;<i class="fa fa-arrow-circle-left"></i>
                            </strong>
                        </a>
                    </p>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>
</div>
<?php
if(isset($_POST['register_button']))
{
    if($_POST['reg_agree'])
    {
        $name=$_POST['reg_name'];
        $password=$_POST['reg_password'];
        $username=$_POST['reg_username'];

        $response=LoginDbCall::insertUser($name,$password,$username);
        if($response)
        {
            ?>
        <script>alert('You have been registered as a User')</script>
        <?php
            header('location: ../');
        }
        else
        {
            ?>
        <script>ifWrongDetailsEntered('This email is already registered')</script>
            <?php
        }
    }
    else
    {
?>
        <script>ifWrongDetailsEntered('You must aggree to our terms and conditions')</script>
<?php
    }
}
?>
</body>
</html>