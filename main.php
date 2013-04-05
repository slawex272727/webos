<?php
require_once("/core/head.php");
require_once("/core/menu.php");
require_once("/core/generaction_window.php");
run_headers();

$GeneratorFieldsIcons = new GeneratorFieldsIcons;
echo $GeneratorFieldsIcons->toStringFirstWindow();

$content = "";
$content .= "<div id='menu'>";
$content .= "<div id='start'>";
  
$content .= "</div>";	
$content .= "</div>";
echo $content;
?>
