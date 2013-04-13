<?php
try
{
require_once "head.php";
require_once "new_user.php";
$content = "";
$newuser = new Newuser;

    $content .= getHtmlHeader().
                    "<body>".
						"<div>".
						
						"</div>".
                    "</body>".
                "</html>";
    
    print $content;
}
catch (Exception $e)
{
   print "FATAL ERROR: {$e->getMessage()}";
}
?>