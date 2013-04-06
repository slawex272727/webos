<?php
  session_start();
  if(isset($_SESSION['init']) && !empty($_SESSION['init']))
  {
      header('location:index.php');
  }
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/login.css" />
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
function CheckUser()
{
      var login=$('#login').val();
      var password=$('#password').val();
      var dataString = 'login='+ login + '&password='+ password;
      $("#chech_user").show();
      $("#chech_user").fadeIn(400).html('<img src="image/loading.gif" />');
      $.ajax({
      type: "POST",
      url: "CheckUser.php",
      data: dataString,
      cache: false,
      success: function(result)
    {
        var result=trim(result);
		$("#chech_user").hide();
		
        if(result=='correct')
		{
            window.location='main.php';
        }
		else
		{
            $("#errorMessage").html(result);
        }
      }
  });
}

</script>
</head>



<form action="core/CheckUser.php" method="POST">
<div id="errorMessage"></div>
<div>
	<input type="text" name="login" id="login">
</div>
<div>
	<input type="password" name="password" id="password">
</div>
<div id="button_box">
	<button type="sumbit" name="submit" class="button" onclick="CheckUser()">Zaloguj</button>
</div>
<div id="chech_user"></div>
</form>





</html>
