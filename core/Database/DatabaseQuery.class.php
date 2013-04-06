<?php

/**
 * Przedstawia proste zapytanie SQL. Stanowi podstawę dla innych zapytań.
 */
class DatabaseQuery
{
    /**
     * $instruction - Nazwa instrukcji SQL
     * $database *- Wskaźnik na bazę danych klasy Database
     */
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