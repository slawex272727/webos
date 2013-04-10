<?php

require_once "config.php";
require_once "session.php";   	
db_connect() ;
$message=array();
if(isset($_POST['login']) && !empty($_POST['login']))
{
    $login=mysql_real_escape_string($_POST['login']);
}
else
{
    $message[]='Prowadz Login';
}

if(isset($_POST['password']) && !empty($_POST['password']))
{
    $password=mysql_real_escape_string($_POST['password']);
}
else
{
    $message[]='Wprowadz Hasło';
}

$countError=count($message);

if($countError > 0)
{
    for($i=0;$i<$countError;$i++)
  {
              echo ucwords($message[$i]).'<br/><br/>';
	}
}
else
{
    $query="select * from user where login='$login' and password='$password'";

    $res=mysql_query($query);
    $checkUser=mysql_num_rows($res);
    if($checkUser > 0){
        $_SESSION['init']=true;
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        echo 'correct';
    }
	else
	{
         echo ucwords('Prosze wprowadzic poprawne dane');
    }
}
?>
