<?php 
?>


<html>
<head>
<title>Loja Virtual</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<link rel="stylesheet" href="css/estilos.css" media="screen and (min-width: 300px)" />
</head>
<body>
<h1>Ficha Tecnica - Cadastro de Produto</h1>
 <div id="fichtec">
	<form id="ficha_tecnica" >


    <input type="submit" value="Enviar" />

	</form>
 <div>
	<br>
<h1>Produto</h1>
<div id="prod">
    <form id="produto">

    <input type="submit" value="Enviar" />

	</form>
</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$.ajax({
				url: "http://localhost/lojavirtual/tabelas/ficha_tecnica",
				dataType: 'json',
				type: 'get'				
			}).done (function (data) {
				alert(data.length);
				for (i = 1; i <= data.length - 1; i++){
				$("#ficha_tecnica").append('<label for='+data[i]+' class="pos"> '+data[i]+' </label>')
				$("#ficha_tecnica").append('<input id='+data[i]+' name='+data[i]+' class="pos" type="text" value="" />')
				}
			});
			$.ajax({
				url: "http://localhost/lojavirtual/tabelas/produto",
				dataType: 'json',
				type: 'get'				
			}).done (function (data) {
				alert(data.length);
				for (i = 1; i <= data.length - 1; i++){
				$("#produto").append('<label for='+data[i]+' class="pos"> '+data[i]+ ' </label>')
				$("#produto").append('<input id='+data[i]+' name='+data[i]+' class="pos" type="text" value="" />')
				}
			});
			
		   $('#ficha_tecnica').submit(function(){
			   var str = $("#ficha_tecnica").serializeArray();
				$.ajax({
						url: "http://localhost/lojavirtual/produtos/ficha_tecnica",
						dataType: 'json',
						type: 'post',
						data: str

				}).done(function(data) {
						alert(data.mensagem);

				});
			})
		$('#produto').submit(function(){
			   var str = $("#produto").serializeArray();
				$.ajax({
						url: "http://localhost/lojavirtual/produtos/produto",
						dataType: 'json',
						type: 'post',
						data: str

				}).done(function(data) {
						alert(data.mensagem);

				});
			})
		});

	</script>

</body>
</html>