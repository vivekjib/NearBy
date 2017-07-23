<?php
include ('db_scripts/LoginDbCall.php');
?>
<html>
<head>
    <!-- All the files that are required -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="files/login_style.css">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <script src="files/login_js.js"></script>

    <script>
        function ifWrongDetailsEntered() {
            $('#status').removeClass('text-center text-info').addClass('text-center text-danger').empty().html("<br>"+'Wrong Details Entered');
        }
    </script>
</head>
<>
<div class="container">
    <!-- LOGIN FORM -->
    <div class="text-center" style="padding:50px 0">
        <div class="logo">login</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post">
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="lg_username" class="sr-only">Username</label>
                            <input type="text" class="form-control" id="lg_username" name="uname" placeholder="Registered Email" required="required">
                        </div>
                        <div class="form-group">
                            <label for="lg_password" class="sr-only">Password</label>
                            <input type="password" class="form-control" id="lg_password" name="pword" placeholder="Password" required="required">
                        </div>
                        <div class="form-group login-group-checkbox">
                            <input type="checkbox" id="lg_remember" name="lg_remember">
                            <label for="lg_remember">remember</label>
                        </div>
                        <p class="text-center text-info" id="status"><br>
                            Click the side button to login
                        </p>
                    </div>
                    <button type="submit" name="login_button" class="login-button" id="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <p>forgot your password? <a href="forgot_password.php">click here</a></p>
                    <p>new user? <a href="user_register.php">create new account</a></p>
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
if(isset($_POST['login_button']))
{
    $email=$_POST['uname'];
    $password=$_POST['pword'];
    $response=LoginDbCall::checkUser($email,$password);

    $success=$response[0];
    if($success === 1)
    {
        $details=$response[1];
        session_start();
        $_SESSION['name']=$details['name'];
        $_SESSION['username']=$details['email'];
        $_SESSION['password']=$details['password'];
        ?>
        <script>
            location.replace('../after-login');
        </script>
        <?php
    }
    else
    {
        ?>
        <script>ifWrongDetailsEntered()</script>
        <?php
    }

}
?>
</body>
</html>