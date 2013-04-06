<?php

/**
 * Przedstawia zapytanie SELECT
 */
class DatabaseQuerySelect extends DatabaseQueryWithWhere
{
    /**
     * $table - Nazwa tabeli
     * $alias *- Alias tabeli
     * $database *- Wskaźnik na bazę danych klasy Database
     */
    public function __construct($table, $alias = null, Database $database = null)
    {
        parent::__construct("SELECT", $database);

        $this->table = $table;
        $this->alias = $alias;
    }

    /**
     * Ustawia kolumny do pobrania
     * $fields - Tablica nazwa kolumn.
     *           Można użyć tablicy asocjacyjnej, wtedy klucz będzie nazwą kolumny a wartość aliasem.
     * return: $this  
     */
    public function fields(array $fileds)
    {
        $this->fields = $fileds;

        return $this;
    }
    
    /**
     * return: Wygenerowane zapytanie SQL
     */
    public function toString()
    {
        return "{$this->instruction} ".
               "{$this->toStringFields()} ".
               "FROM {$this->toStringTable()} ".
               "{$this->toStringWhere()}";
    }

    /**
     * return: Wygenerowana lista kolumn do zapytania SQL
     */
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
    
    /**
     * return: Nazwa tabeli do zapytania SQL 
     */
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

?>