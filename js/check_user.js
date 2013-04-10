$(document).ready(function() {
$("#button-logIn").click(function() 
{
      var login=$('#login').val();
      var password=$('#password').val();
      var dataString = 'login='+ login + '&password='+ password;
      $("#chech_user").show();
      $("#chech_user").fadeIn(400).html('<img src="images/loading.gif" />');
      $.ajax({
      type: "POST",
      url: "core/CheckUser.php",
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
});
function trim(str)
{
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
}
});
