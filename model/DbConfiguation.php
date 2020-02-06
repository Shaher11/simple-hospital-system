<?php
class DbConfiguation
{
    public $server = "localhost";
    public $userName = "root";
    public $pass = "";
    public $database ="hmis_hospital";
    public $conn;
    public function __construct()
 {
    $this->conn=mysqli_connect($this->server,$this->userName,$this->pass,$this->database);
    

    if (mysqli_errno($this->conn))
        {
        echo 'Connection to database failed';
        }
 }
}
