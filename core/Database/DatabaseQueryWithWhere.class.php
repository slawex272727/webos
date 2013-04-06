<?php

/**
 * Służy do zapytań które obsługują warunek WHERE w zapytaniach SQL.
 */
class DatabaseQueryWithWhere extends DatabaseQuery
{   
    /**
     * Ustawia warunek WHERE
     * $field - Nazwa kolumny
     * $value - Wartość do porównania
     * $operator *- Operator porównania (domyślnie =)
     * return: Obiekt klasy DatabaseQueryWhere
     */
    public function where($field, $value, $operator = "=")
    {
        $this->setNextWhere(null, $field, $value, $operator);
        return $this;
    }
    
    /**
     * Ustawia następny warunek. Wywołanie tej metody, unieważni poprzednie wywołanie metoda w_and.
     * $field - Nazwa kolumny
     * $value - Wartość do porównania
     * $operator *- Operator porównania (domyślnie =)
     * return: $this
     */
    public function w_or($field, $value, $operator = "=")
    {
        $this->setNextWhere("OR", $field, $value, $operator);
        return $this;
    }
    
    /**
     * Ustawia następny warunek. Wywołanie tej metody, unieważni poprzednie wywołanie metoda w_or.
     * $field - Nazwa kolumny
     * $value - Wartość do porównania
     * $operator *- Operator porównania (domyślnie =)
     * return: $this
     */
    public function w_and($field, $value, $operator = "=")
    {
        $this->setNextWhere("AND", $field, $value, $operator);
        return $this;
    }
    
    /**
     * Ustawia kolejny warunek WHERE
     * $whereOperator - Operator 'OR', 'AND' lub null
     * $field - Nazwa kolumny
     * $value - Wartość do porównania
     * $operator *- Operator porównania (domyślnie =)
     */
    private function setNextWhere($whereOperator, $field, $value, $operator = "=")
    {
        $next = new ClauseWhere($field, $value, $operator);
    
        $this->where[] = array (
                "object" => $next,
                "operator" => $whereOperator
        );
    }
    
    /**
     * return: Wygenerowane zapytanie SQL
     */
    public function toString()
    {
        return "{$this->instruction} {$this->toStringWhere()}";
    }
    
    /**
     * return: Warunek WHERE dla zapytania SQL
     */
    protected function toStringWhere()
    {
        if ($this->where === null)
            return null;
        
        $where = "WHERE";
        
        foreach ($this->where as $next)
            $where .= "{$next['operator']} {$next['object']->toString()} ";
    
        return $where;
    }
    
    private $where = array();
}

?>