<?php

function getHtmlHeader()
{
    return "<!DOCTYPE html>".
           "<html>".
               "<head>".
                   "<meta charset='utf-8' />".
                   "<title>nazwa.pl</title>".
                   "<link rel='icon' href='images/favicon.ico' type='image/x-icon' />".
                   "<link rel='stylesheet' href='css/style.css' type='text/css' />".
				   "<script src='http://code.jquery.com/jquery-1.9.1.js'></script>".
				   "<script src='js/top_menu.js'></script>".
               "</head>";
}

?>
