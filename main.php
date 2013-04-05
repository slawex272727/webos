<?php

try
{
    require_once "core/head.php";
    require_once "core/generaction_window.php";
    
    $content = "";
    
    $generatorFieldsIcons = new GeneratorFieldsIcons;
    
    $content .= getHtmlHeader().
                    "<body>".
                        $generatorFieldsIcons->toStringFirstWindow().
                        "<div id='menu'>".
                            "<div id='start'>".
                            "</div>".	
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
