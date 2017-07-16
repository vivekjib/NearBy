<?php
class LoginDbCall{
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "mysql";
    private static $dbname = "nearby";

//        private static $servername = "localhost";
//        private static $username = "id2221158_nearby";
//        private static $password = "mysql";
//        private static $dbname = "id2221158_nearby";
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
}
?>