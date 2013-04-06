<?php

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

?>