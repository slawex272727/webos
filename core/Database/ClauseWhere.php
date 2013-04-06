<?php

/**
 * Symuluje warunek WHERE w zapytaniach SQL
 */
class ClauseWhere
{
    /**
     * $field - Nazwa kolumny
     * $value - Wartość do porównania
     * $operator *- Operator porównania (domyślnie =)
     */
    public function __construct($field, $value, $operator = "=")
    {
        $this->field = $field;
        $this->value = $value;
        $this->operator = $operator;
    }

    /**
     * Generuje fragment WHERE do zapytania SQL.
     * UWAGA! wygenerowany fragment nie zawiera WHERE
     * return: Fragment zapytania SQL
     */
    public function toString()
    {
        if (is_string($this->value))
            $value = "'{$this->value}'";
        else
            $value = $this->value;

        return "{$this->field} {$this->operator} {$value}";
    }

    private $field = null;
    private $value = null;
    private $operator = null;
}

?>