<?php

/**
 * Tworzy poziom abstrakcji do obługi bazy danych.
 */
class Database
{
    public function __construct($host = null, $user = null, $password = null, $database = null)
    {
        $this->mysqli = new mysqli($host, $user, $password, $database);
        
        if ($this->mysqli->connect_error)
        	throw new Exception($this->mysqli->connect_error);
    }
    
    public function __destruct()
    {
        $mysqli->close();
    }
    
    private $mysqli = null;
}

?>