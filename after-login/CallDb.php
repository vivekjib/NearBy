<?php
    class CallDb{
        private static $servername = "localhost";
        private static $username = "root";
        private static $password = "mysql";
        private static $dbname = "nearby";


        public static function fetchLocations($worker_type)
        {
// Create connection
            $conn = new mysql(self::$servername, self::$username, self::$password, self::$dbname);
// Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM markers WHERE type=".$worker_type;
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