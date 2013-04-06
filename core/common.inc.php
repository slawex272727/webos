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
    foreach (getDirsListInDir("core") as $dir)
    {
        $pathList = array();
        $pathList[] = "{$dir}/{$class}.php";
        $pathList[] = "{$dir}/{$class}.class.php";
        
        foreach ($pathList as $path)
        {
            if(file_exists($path))
            {
                require_once $path;
                return true;
            }
        }
    }
    
    throw new Exception("Class {$class} was not found!");
}

/**
 * Pobiera listę katalogów
 * $dir - Katalog
 * return: Jednowymiarowa tablica nazw katalogów
 */
function getDirsListInDir($dir)
{
    $files = array($dir);
    
    foreach (new DirectoryIterator($dir) as $file)
    {
        if($file->isDot())
            continue;
        
        if ($file->isDir())
        {
            $dirsList = getDirsListInDir($file->getPathname());
            
            foreach ($dirsList as $dir)
                $files[] = $dir;
        }
    }

    return $files;
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