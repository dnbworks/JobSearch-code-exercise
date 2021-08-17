<?php

class Search {
    private $conn;
    private $table = 'jobs';


    // searched properties
    public $id;
    public $title;
    public $state;
    public $description;


    // dbconn
    public function __construct($db)
    {
        $this->conn = $db;

    }

    // get jobs
    public function search($searched_array, $description){
        $sql = 'SELECT id, title, state, description, date_post FROM ' . $this->table . ' WHERE title LIKE :search OR ';

        $sql .= $description;

        $search = "%$searched_array%";
    
        // prepared statement
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['search' => $search]);
        return $stmt;
    }
}