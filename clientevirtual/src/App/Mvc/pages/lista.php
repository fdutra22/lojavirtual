<?php 
?>


<html>
<head>
<title>Loja Virtual</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<link rel="stylesheet" href="css/estilos.css" media="screen and (min-width: 300px)" />
</head>
<body>
<h1>Ficha Tecnica - Lista de Produto</h1>
 <div id="list">
	
     <label for='lista' class="pos"> Lista: </label>
	 <input id='lista' name='lista' class="pos" type="text" value="" />
				

    <button id="enviar" value="Enviar" >Enviar</button>

	
 <div>
	<br>
<h1>Produto</h1>
<div id="prod">
    <table class="table table-condensed" align="center">
    <thead>
      <tr>
        
      </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
</div>
	<script type="text/javascript">
		$(document).ready(function() {
			
		   $('#enviar').click(function(){
			   var str = $("#lista").val();
			   
			   $.ajax({
						url: "http://localhost/lojavirtual/tabelas/"+str,
						dataType: 'json',
						type: 'get'
						

				}).done(function(data) {
						for (i = 0; i <= data.length - 1; i++){
							
				$("#prod > table > thead > tr").append('<th> '+data[i]+ ' </th>')
							
						}
				});
				$.ajax({
						url: "http://localhost/lojavirtual/produtos/"+str,
						dataType: 'json',
						type: 'get'
						

				}).done(function(data) {
					$.each(data, function(i, item) {
					$.each(data, function(x, itemw) {
					alert(itemw);
					});
					});

alert(data[0][1].length - 1);
						for (i = 0; i <= data.length - 1; i++){
							$("#prod > table > tbody").append('<tr>');
							for (x = 0; x <= data[i][1].length - 1; x++){
				$("#prod > table > tbody > tr").append('<td> '+data[i][x]+ ' </td>')
							}
							$("#prod > table > tbody").append('</tr>');
						}
				});
			})
		
		});

	</script>

</body>
</html>