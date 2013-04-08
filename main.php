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
						"<div id='contenair'>".
							"<div id='top_menu'>".
								"<div id='ubunut_desktop'>UBUNTU DESKTOP</div>".
								"<div id='emtpy_gnome_menu'></div>".			
								"<div id='wifi_menu'></div>".			
								"<div id='sound_menu'></div>".
								"<div id='time_menu'>12:04PM</div>".	
								"<div id='setting'></div>".	
								"<div id='menu_setting' style='display: none'>opcja 1</div>".								
							"</div>".
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
