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

	<label for="id_produto">Id Produto</label>
    <input id="id_produto" name="id_produto" type="text" value="" />
	<label for="titulo_atributo">Titulo Atributo</label>
    <input id="titulo_atributo" name="titulo_atributo" type="text" value="" />
	<label for="contexto">Contexto</label>
    <input id="contexto" name="contexto" type="text" value="" />

    <input type="submit" value="Enviar" />

	</form>
 <div>
	<br>
<h1>Produto</h1>
<div id="prod">
    <form id="produto">

	<label for="nome">Nome Produto</label>
    <input id="nome" name="nome" type="text" value="" />
	<label for="valor_venda">Valor Venda</label>
    <input id="valor_venda" name="valor_venda" type="text" value="" />
	<label for="desconto">Desconto</label>
    <input id="desconto" name="desconto" type="text" value="" />
	<label for="descricao">Descrição</label>
    <input id="descricao" name="descricao" type="text" value="" />
	<label for="visivel">Visivel</label>
    <input id="visivel" name="visivel" type="text" value="" />
	<label for="destaque_home">Destaque HOME</label>
    <input id="destaque_home" name="destaque_home" type="text" value="" />
	<label for="destaque_home_blog">Dstaque Home Blog</label>
    <input id="destaque_home_blog" name="destaque_home_blog" type="text" value="" />
	<label for="ficha_tecnica_id_ficha_tecnica">ID Ficha Tecnica</label>
    <input id="ficha_tecnica_id_ficha_tecnica" name="ficha_tecnica_id_ficha_tecnica" type="text" value="" />

    <input type="submit" value="Enviar" />

	</form>
</div>
	<script type="text/javascript">
		$(document).ready(function() {
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