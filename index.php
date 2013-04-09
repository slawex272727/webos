<html>
<?php

try
{
    require_once "core/head.php";
    require_once "core/generaction_window.php";
    
    $content = "";
    
    $generatorFieldsIcons = new GeneratorFieldsIcons;
    
    $content .= getHtmlHeader().
                    "<body>".
					"<div id='start_window'>".
						"<div id='top_start_menu'></div>".
							"<div id='left_start_window'>".
								"<div id='login_panel'>".
								"</div>".
							"</div>".			
							"<div id='right_start_window'></div>".							
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