<?php


class Connection{

    static  function startConnection(){
        $host = "localhost";
        $username = 'Ryszard';
        $haslo = 'test';
        $dbname = 'bookhandel';

        $conn = new mysqli($host, $username,$haslo,$dbname);
        if($conn->connect_error){
            die("Blad podczas ");
        }
        return $conn;
    }
        //*mysqli $connection
        static function stopConnection(mysqli $connection){
            $connection->close();
        }
}
