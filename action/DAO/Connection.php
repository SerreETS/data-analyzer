<?php

    class Connection {
        public static $connection = null;
     
        public static function getConnection() {
            
            $user = "root";
            $pw = "serreets";

            if (Connection::$connection == null) {
            	Connection::$connection = new PDO('mysql:dbname=Eau;charset=utf8;host=192.168.2.20', $user, $pw);
                Connection::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                Connection::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            }
            
            return Connection::$connection;
        }
        
        public static function closeConnection() {
            Connection::$connection = null;
        }
    }