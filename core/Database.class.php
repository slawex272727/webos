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

class DatabaseQuerySelect extends DatabaseQuery
{
    public function __construct($table, $alias = null, Database $database = null)
    {
        parent::__construct("SELECT", $database);
        
        $this->table = $table;
        $this->alias = $alias;
    }
    
    public function fields(array $fileds)
    {
        $this->fields = $fileds;
        
        return $this;
    }
    
    public function toString()
    {
        return "{$this->instruction} {$this->toStringFields()} FROM {$this->toStringTable()}";
    }
    
    private function toStringFields()
    {
        if ($this->fields === null)
            return "*";
        
        $str = "";
        
        foreach ($this->fields as $key => $value)
        {
            if (is_numeric($key) == false)
                $str .= "{$key} as {$value}";
            else
                $str .= $value;
            
            if ($value !== end($this->fields))
                $str .= ", ";
        }
        
        return $str;
    }
    
    private function toStringTable()
    {
        if ($this->alias !== null)
            return "{$this->table} as {$this->alias}";
        else
            return $this->table;
    }
    
    private $table = null;
    private $alias = null;
    
    private $fields = null; 
}

class DatabaseQuery
{
    public function __construct($instruction, Database $database = null)
    {
        $this->instruction = $instruction;
        $this->database = $database;
    }
    
    /**
     * Wykonuje polecenie SQL
     * return: Odpowiedź bazy danych
     * throw: Wskaźnik na bazę danych jest pusty
     */
    public function exec()
    {
        if ($this->database === null)
            throw new Exception("Pointer to an object database is empty");
        
        return $this->database->query($this->toString());
    }
    
    /**
     * return: Wygenerowane zapytanie SQL
     */
    public function toString()
    {
        return $this->instruction;
    }
    
    protected $instruction = null;
    protected $database = null;
}

?>