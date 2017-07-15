<?php
include ('LoginDbCall.php');
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>NearBYlogin</title>
    <link rel="icon" href="../images/favicon.ico">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>

    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm" id="#sign-in">
                    <form method="post">
                        <div class="group">
                            <label for="username" class="label">Username</label>
                            <input id="username" name="username" type="email" class="input" placeholder="Enter your Email" required="required">
                        </div>
                        <div class="group">
                            <label for="password" class="label">Password</label>
                            <input id="password" name="password" type="password" class="input" data-type="password" required="required" placeholder="Enter Password">
                        </div><br><br>
                        <!--<div class="group">-->
                        <!--<input id="check" type="checkbox" class="check" checked>-->
                        <!--<label for="check"><span class="icon"></span> Keep me Signed in</label>-->
                        <!--</div>-->
                        <div class="group">
                            <input type="submit" name="login" id="login" class="button" value="Sign In">
                        </div>
                    </form>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>

                    </div>

                </div>
                <div class="sign-up-htm">
                    <form method="post">
                        <div class="group">
                            <label for="user-register" class="label">Full Name</label>
                            <input id="user-register" name="name_register" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="password-register" class="label">Password</label>
                            <input id="password-register" name="password_register" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="email-register" class="label">Email Address</label>
                            <input id="email-register" name="email_register" type="email" class="input" placeholder="xxx@example.com">
                        </div>
                        <div class="group">
                            <input type="submit" name="register" id="register" class="button" value="Sign Up">
                        </div>

                    </form>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a for="tab-1">Already Member?</a>

                    </div>
                </div>


            </div>
        </div>
    </div>

</body>
<script>
    $(document).ready(function () {
        $('#login').on('click',function () {
            var username=$('#username').val();
            var password=$('#password').val();
            callScript('',password,username,1);
        });
        $('#register').on('click',function () {
            var user_register=$('#user-register').val();
            var pass_register=$('#password-register').val();
            var email_register=$('#email-register').val();
            callScript(user_register,pass_register,email_register,2);
        });
        function callScript(uname,pword,email,option) {
            $.ajax({
                type:'GET',
                url:'/by/login/LoginCall.php?uname'+uname+'&pword='+pword+'&email='+email+'&option='+option,
                success:function (data) {
                    if(data ==1)
                    {
                        window.location=('../after-login');
                    }
                    else{
                        if(option==1)
                        {
                            alert('Wrong Details Entered');
                            //$('#login-status').html('<p>Wrong username or password</p>')
                        }
                        else
                        {
                            alert('Email Already Registered');
//                            $('#register-status').html('<p>Email Already Registered</p>');
                        }
                    }
                },
                error:function (data) {
//                    if(option==1)
//                    {
                        alert('Error in Connection');
//                        $('#login-status').html('<p>Error in Connection</p>')
//                    }
//                    else
//                    {
////                        $('#register-status').html('<p>Error in Connection</p>');
//                    }
                }

            });
        }
    });
</script>
</html>
