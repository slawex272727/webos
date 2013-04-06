<?php

/**
 * Tworzy poziom abstrakcji do obługi bazy danych.
 */
class Database
{
    /**
     * $host *- Nazwa hosta
     * $user *- Nazwa użytkownika
     * $password *- Hasło
     * $database *- Nazwa bazy danych  
     */
    public function __construct($host = "localhost", $user = "root", $password = "", $database = "webos")
    {
        $this->mysqli = new mysqli($host, $user, $password, $database);
        
        if ($this->mysqli->connect_error)
            throw new Exception($this->mysqli->connect_error);
    }
    
    public function __destruct()
    {
        $this->mysqli->close();
    }
    
    /**
     * Przygotowuje zapytanie SELECT
     * $table - Nazwa tabeli
     * $alias *- Alias dla tabeli
     * return: Obiekt DatabaseQuerySelect
     */
    public function select($table, $alias = null)
    {
        return new DatabaseQuerySelect($table, $alias, $this);
    }
    
    /**
     * Wykonuje zapytanie SQL
     * $query - Treść zapytania
     * return: Tablica obiektów (stdClass) jako odpowiedź serwera
     * throw: Nieudane wykonanie zapytania
     */
    public function query($query)
    {
        $result = $this->mysqli->query($query);
        
        if ($this->mysqli->errno)
            throw new Exception($this->mysqli->error);
        
        $table = array();
        while ($row = $result->fetch_object())
            $table[] = $row;
        
        $result->close();
        return $table;
    }
    
    private $mysqli = null;
}

?>