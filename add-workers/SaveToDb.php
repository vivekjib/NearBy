<?php
    class SaveToDb{
        private static $servername = "localhost";
        private static $username = "root";
        private static $password = "mysql";
        private static $dbname = "nearby";


        public static function insertLocations($name,$type,$address,$lat,$lng)
        {   $lat=(float)$lat;
            $lng=(float)$lng;
// Create connection
            $conn = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
// Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql ="INSERT INTO markers (worker_name,worker_type,address,lat,lng) VALUES ('$name','$type','$address','$lat','$lng')";
            //$result = $conn->query($sql);
            if ($conn->query($sql) === TRUE) {
                return 1;
            } else {
                return 0;
            }

            $conn->close();
        }
    }
?>