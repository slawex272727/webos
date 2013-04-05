<?php

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'zlecenie');

function db_connect() 
{

  mysql_connect(DBHOST, DBUSER, DBPASS);
	mysql_select_db(DBNAME);
    mysql_query("SET NAMES utf8");
    mysql_query("SET CHARACTER_SET utf8_unicode_ci");
}

function db_close() 
{
	mysql_close();
}

?>
