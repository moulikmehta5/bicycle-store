<?php

    class Connection { 

        public function dbConnection() {
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bicycledb";

            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Check connection
            if ($conn->connect_error) {
                $error = "Database connection failed: " . $conn->connect_error;
                header("Location: http://localhost/bicycle-store/views/errorView.php?$error");
            } 
            return $conn;           
        }
    }

?>