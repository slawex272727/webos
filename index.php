<html>
<?php

try
{
    require_once "core/head.php";
    require_once "core/generaction_window.php";
    require_once "core/config.php";
    require_once "core/session.php";   	
	db_connect() ;
    $content = "";
    
    $generatorFieldsIcons = new GeneratorFieldsIcons;
    
    $content .= getHtmlHeader().
                    "<body>".
					"<div id='start_window'>".
						"<div id='top_start_menu'></div>".
							"<div id='left_start_window'>".
								"<div id='login_panel'>".
								"<form action='core/CheckUser.php' method='POST'>".
									"<div id='errorMessage'></div>".
										"<div>".
											"<input type='text' name='login' id='login'>".
										"</div>".									
										"<div>".
											"<input type='password' name='password' id='password'>".
										"</div>".	
										"<div id='button_box'>".
											"<button type='sumbit' name='submit' class='button' id='button-logIn'>Zaloguj</button>".
										"</div>".
										"<div id='chech_user'></div>".										
								"</form>".
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