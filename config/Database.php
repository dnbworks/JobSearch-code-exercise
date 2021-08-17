<?php

class Database {

    private $host = 'localhost';
    private $dbname = 'risky_jobs';
    private $user = 'root';
    private $pwd = '';
    private $conn;



    public function connect(){
        $this->conn = null;

        try{
            $this->conn = new PDO('mysql::host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pwd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo 'connection Error' . $e->getMessage();
        }

        return $this->conn;
    }


}