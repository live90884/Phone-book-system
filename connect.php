<?php
    define("DB_SERVER","localhost");
    define("DB_USERNAME","root");
    define("DB_PASSWORD","");
    define("DB_NAME", "club");

            // Create connection
            $connection = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            return $connection
?>