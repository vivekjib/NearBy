<?php
    class CallDb{
//        private static $servername = "localhost";
//        private static $username = "root";
//        private static $password = "mysql";
//        private static $dbname = "nearby";

        private static $servername = "localhost";
        private static $username = "id2221158_nearby";
        private static $password = "mysql";
        private static $dbname = "id2221158_nearby";
        public static function fetchLocations($worker_type,$city)
        {
// Create connection
            $conn = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
// Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM markers WHERE worker_type='$worker_type' AND city='$city'";
            $result = $conn->query($sql);
            $data=[];
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $data[]=$row;
                }
            } else {
                return 0;
            }

            $conn->close();

            return $data;
        }
    }
?>