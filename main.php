<?php

try
{
    require_once "core/common.inc.php";
    
    require_once "core/head.php";
    require_once "core/generaction_window.php";
    
    $content = "";
    
    $generatorFieldsIcons = new GeneratorFieldsIcons;
    
    $content .= getHtmlHeader().
                    "<body>".
						"<div id='contenair'>".
							"<div id='top_menu'></div>".
							"<div id='FullWindow'>".
								"<div id='left_menu'></div>".							
									//"<div id='window'>".
									//	$generatorFieldsIcons->toStringFirstWindow().
									//"</div>".														
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
