<?php 
?>


<html>
<head>
<title>Loja Virtual</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>
	<form id="novo" action="index.php" method=POST>

	<label for="login">Login</label>
    <input id="login" name="login" type="text" value="" />
	<label for="senha">Senha</label>
    <input id="senha" name="senha" type="text" value="" />
	<label for="id_pessoa">id_pessoa</label>
    <input id="id_pessoa" name="id_pessoa" type="text" value="" />

    <input type="submit" value="Enviar" />

	</form>

	<script type="text/javascript">
		$(document).ready(function() {
		   $('#novo').submit(function(){
			   var str = $("#novo").serializeArray();
				$.ajax({
						url: "index.php",
						dataType: 'json',
						type: 'POST',
						data: str

				}).done(function(data) {
						alert(data.mensagem);

				});
			})

		});

	</script>

</body>
</html>