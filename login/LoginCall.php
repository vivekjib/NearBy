<?php
include ('LoginDbCall.php');

$name=$_REQUEST['uname'];
$password=$_REQUEST['pword'];
$uname=$_REQUEST['email'];
$option=$_REQUEST['option'];

if(!empty($name) && !empty($password) && !empty($uname) && !empty($option))
{
    if($option == 1)
    {
        echo LoginDbCall::checkUser($uname,$password);
    }
    else if($option == 2)
    {
        echo LoginDbCall::insertUser($name,$password,$uname);
    }
    else{
        echo "Make a valid choice";
    }
}

else
{
 echo 'Please Give all your Details';
}