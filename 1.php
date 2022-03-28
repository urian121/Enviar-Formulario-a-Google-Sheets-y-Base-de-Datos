<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="recibFormGoogleSheets.php" method="post" id="my_form">
    <label>Name</label>
    <input type="text" name="Nombre" />
    <label>Email</label>
    <input type="email" name="Correo" />
    <label>Website</label>
    <input type="number" name="Movil" />
    <input type="submit" name="submit" value="Submit Form" />
<div id="server-results"><!-- For server results --></div>
</form>


<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script>
$("#my_form1").submit(function(event){
	event.preventDefault(); //prevent default action 
	var post_url = $(this).attr("action"); //get form action url
	var form_data = $(this).serialize(); //Encode form elements for submission
	
	$.post( post_url, form_data, function( response ) {
	  $("#server-results").html( response );
	});
});


$("#my_form").submit(function(event){
	event.preventDefault(); //prevent default action 
	var post_url = $(this).attr("action"); //get form action url
	var request_method = $(this).attr("method"); //get form GET/POST method
	var form_data = $(this).serialize(); //Encode form elements for submission
	
	$.ajax({
		url : post_url,
		type: request_method,
		data : form_data
	}).done(function(response){ //
		$("#server-results").html(response);
	});
});

</script>
</body>
</html>