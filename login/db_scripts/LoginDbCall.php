<?php
class LoginDbCall{
//    private static $servername = "localhost";
//    private static $username = "root";
//    private static $password = "mysql";
//    private static $dbname = "nearby";

        private static $servername = "localhost";
        private static $username = "id2221158_nearby";
        private static $password = "mysql";
        private static $dbname = "id2221158_nearby";
    public static function insertUser($uname,$pword,$email)
    {
        try{
            $conn = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
// Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql ="INSERT INTO users (name,email,password) VALUES ('$uname','$email','$pword')";
            //$result = $conn->query($sql);
            if ($conn->query($sql) === TRUE) {
                return 1;
            } else {
                return 0;
            }

            $conn->close();
        }
        catch (Exception $e)
        {
            return $e;
        }
    }
    public static function checkUser($username,$password)
    {
        // Create connection
        $conn = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM users WHERE email='$username' AND password='$password'";
        $result = $conn->query($sql);
        $data=[];
        if ($result->num_rows > 0) {
            // output data of each row
            $first_result_rows=$result->fetch_assoc();
            return [1,$first_result_rows];
        } else {
            return 0;
        }

        $conn->close();

        return $data;
    }
    public static function forgotPassword($email)
    {
        // Create connection
        $conn = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
        $password=rand(100000,999999);
        $data=[];
        if ($result->num_rows > 0) {
            // output data of each row
            $fp_sql="UPDATE users SET password='$password' WHERE email='$email'";
            if($conn->query($fp_sql))
            {
                return self::doEmail($email,$password);
            }
            else
            {
                return 0;
            }
        } else {
            return 0;
        }

        $conn->close();

        return $data;
    }
    public static function doEmail($email,$password)
    {
        //Mailing
        $content="Hi ".$email." How are you."."Your New Password is ".$password;
        $msg = wordwrap($content,70);
        $to=$email;
        $subject="NearBy Password Change";
        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: NearBy Password <info@address.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // send email
        if(mail($to,$subject,$msg,$headers)){
            return 1;
        }
        else{
            return 0;
        }

    }
    public static function addWorker($name,$type,$number,$address,$city,$lat,$lngt)
    {
        try{
            $conn = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
// Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql ="INSERT INTO markers (worker_name,worker_type,mobile,address,city,lat,lng) VALUES ('$name','$type','$number','$address','$city','$lat','$lngt')";
            //$result = $conn->query($sql);
            if ($conn->query($sql) === TRUE) {
                return 1;
            } else {
                return 0;
            }

            $conn->close();
        }
        catch (Exception $e)
        {
            return $e;
        }
    }
}
?>