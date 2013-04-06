<?php

try
{
    require_once "core/common.inc.php";
    
    require_once "core/head.php";
    require_once "core/generaction_window.php";
    
    $content = "";
    
    $db = new Database("localhost", "root", "", "zlecenie");
    
    $select = $db->select("ikon", "i")
                 ->fields(array("id", "fid", "icon"))
                 ->where("icon", "computer")
                 ->w_or("id", "1")
                 ->w_and("fid", 1);
                 
    
    debug ($select->toString());
    debug ($select->exec());
    
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
   print "FATAL ERROR: <br>".
         "<pre>{$e}</pre>";
}

?>
