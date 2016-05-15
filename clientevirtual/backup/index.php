<?php 
?>


<html>
<head>
<title>Loja Virtual</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>

	<label for="login">Nome</label>
    <input id="nome" name="nome" type="text" value="" />
	
	<label for="id_pessoa">id_pessoa</label>
    <input id="id_pessoa" name="id_pessoa" type="text" value="" />

    <button id="enviar" value="Enviar" />Enviar</button>

	<script type="text/javascript">
		
		$(document).ready(function() {
		  $('#enviar').click(function(){
			   var value = $("#nome").val();
			   var url = "http://localhost/lojavirtual/pessoas/pessoa/"+value
			$.ajax({
				url: url,
				type: 'GET'
			}).then(function(data) {
				   var nome = data['NOME'];           
                    alert(nome);
                          
			  
			   //$('.greeting-content').append(data.content);
			});
		  })
		});

	</script>

</body>
</html>