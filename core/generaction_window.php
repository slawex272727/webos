<?php
require_once("config.php");
db_connect() ;
class GeneratorFieldsIcons
{
    public function toStringFirstWindow()
    {
       $content = "";
        $iconsForFields = $this->getIconsForFieldsFromDatabase();
       
        $content .= "<div id='window_for_ikons'>";
       
        for ($x = 0; $x < $this->width; $x++)
        {
            for ($y = 0; $y < $this->height; $y++)
            {
                $fid = ($y * $this->width) + $x + $y;
               
                if (isset($iconsForFields[$fid]))
  			
                    $icon = $iconsForFields[$fid];
				
                else
				
                    $icon = "BRAK";
                
                $content .= "<div id='{$fid}' class='icon'>{$icon}</div>";
            }
        }
       
        $content .= "</div>";
       
        return $content;
    }
 
    private function getIconsForFieldsFromDatabase($table = "ikon")
    {
         $fields = array ();
         
         $query = "SELECT fid, icon FROM {$table}";
         $result = mysql_query($query);
         if (mysql_errno() != 0)
		{
			 print mysql_error();
			 exit;
		}

         while ($row = mysql_fetch_object($result))
            $fields[$row->fid] = $row->icon;
         
         return $fields;
    }
	private $width = 10;
    private $height = 8;
}
 
?>
