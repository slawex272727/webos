<?php

/**
 * Przerabia błedy php na wyjątki
 */
function exception_error_handler($errno, $errstr, $errfile, $errline)
{
	throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}
set_error_handler("exception_error_handler");

/**
 * Automatycznie importuje potrzebną klasę
 */
function __autoload($class)
{
    $pathList = array(
    		    "core/{$class}.php",
    		    "core/{$class}.class.php"
    		);
    
    foreach ($pathList as $path)
    {
    	if(file_exists($path))
    	{
    		require_once $path;    
    		return true;
    	}
    }
    
    throw new Exception("Class {$class} was not found!");
}

/**
 * Wyświela wartość zmiennej na ekran
 * $var - Zmienna
 */
function debug($var)
{
    print "<pre>".
              htmlspecialchars(print_r($var, true)).
          "</pre>";
}

?>