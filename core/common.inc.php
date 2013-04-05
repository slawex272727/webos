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
function __autoload($className)
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

?>