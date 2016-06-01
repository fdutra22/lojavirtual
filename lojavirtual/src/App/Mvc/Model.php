<?php
	namespace App\Mvc;
	use PDO;
	
 
   class Model
   {
	  
	  
	    
      public function select($url, $get)  //função para retornar os dados 
      {
		  require '/dbconfig.php'; 	//arquivo de configuração do banco de dados usando PDO
			$tabela = explode("/", $url); //explode para pegar os parametros da url $tabela[3] = pessoa por exemplo
			if ( sizeof($tabela) > 4 ){
				if (is_numeric($tabela[4])) {  //if de select para buscar por id ou por nome
				
				$stmt = $conn->prepare("SHOW COLUMNS FROM $tabela[3]");
                $stmt->execute();
			
                while($e = $stmt->fetch()){
                 $colunas[] = $e['Field']; //pega os nomes da colunas
				}
				 $sql = "select * from $tabela[3] where $colunas[0] = :id_$tabela[3]";
				 $param = "id_$tabela[3]";
			
				} else {
				 $sql = "select * from $tabela[3] where nome = :nome";
				 $param = "nome";
				}
					$stmt = $conn->prepare($sql); 
					$stmt->bindParam($param, $tabela[4]);
					$stmt->execute();
					$users = $stmt->fetchObject();
			}else{
			$sql = "select * from $tabela[3]";
			$stmt = $conn->prepare($sql); 
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$users = $stmt->fetchAll();
			}
		   	
            
			//$conn = null;
		
			header("content-type:application/json");
			if ($tabela[2] == 'tabelas'){
				$stmt = $conn->prepare("SHOW COLUMNS FROM $tabela[3]");
                $stmt->execute();
			
                while($e = $stmt->fetch()){
                 $colunas[] = $e['Field']; //pega os nomes da colunas
				}
				 echo json_encode($colunas);
			} else {
           echo json_encode($users);
		    }
      }
	  
	  public function insert($url, $post) //função para inserir os dados
	  {
		   require '/dbconfig.php'; //arquivo de configuração do banco de dados usando PDO
		   	 $tabela = explode("/", $url); //explode para pegar os parametros da url $tabela[3] = pessoa por exemplo e $tabela[4] = id
			foreach( $post AS $k => $v ) {
			  $columns[] = $k;  //pega os nomes das colunas
    		  $values[] = '?';  //colocar ? em values
			  //echo $k ." => " , $v;
			}
			$customColumns = implode($columns, ','); //constroi as colunas
			$customValues = implode($values, ',');  //constroi ? em values para o bindParam
               //echo $url;
			   
	            $sql = "INSERT INTO $tabela[3] ($customColumns) VALUES ($customValues)";
			
			try {
			$stmt = $conn->prepare($sql); 
				foreach( $post AS $k => $v ) {
				  $bindParam[] = $v; //pega os valores para bindParam
				}			
				$stmt->execute($bindParam);
				$user = $conn->lastInsertId();
				$conn = null;
				echo json_encode($user); 
			} catch(PDOException $e) {
				echo '{"error":{"text":'. $e->getMessage() .'}}'; 
			}
		   
		  
	  }
	  public function delete($url)  //função para deletar os dados
	  { 
		   require '/dbconfig.php';  //arquivo de configuração do banco de dados usando PDO
		   	   	$tabela = explode("/", $url); //explode para pegar os parametros da url $tabela[3] = pessoa por exemplo
				$stmt = $conn->prepare("SHOW COLUMNS FROM $tabela[3]");
                $stmt->execute();
			
                while($e = $stmt->fetch()){
                 $colunas[] = $e['Field']; //pega os nomes da colunas
				}
	            $sql = "DELETE FROM $tabela[3] WHERE $colunas[0] = :id_pessoa";

			try {

				$stmt = $conn->prepare($sql); 
				$stmt->bindParam("id_pessoa", $tabela[4]);
				$status = $stmt->execute();

				$conn = null;
				echo json_encode($status); 
			} catch(PDOException $e) {
				echo '{"error":{"text":'. $e->getMessage() .'}}'; 
			}
		  
	  }
	   public function update($url, $put) //função para atualizar os dados
	  {
		   require '/dbconfig.php'; //arquivo de configuração do banco de dados usando PDO
		   	  $tabela = explode("/", $url); //explode para pegar os parametros da url $tabela[3] = pessoa por exemplo
			  foreach( $put AS $k => $v ) {
			  $columns[] = $k;  //pega os nomes das columas
			}
			$customSets = implode($columns, '=?,').'=?'; //constroi o set
			$stmt = $conn->prepare("SHOW COLUMNS FROM $tabela[3]");  
                $stmt->execute();
			
                while($e = $stmt->fetch()){
                 $colunas[] = $e['Field']; //pega os nomes da colunas
				}
				
			 $sql = "UPDATE $tabela[3] SET $customSets WHERE $columas[0] = ?";
			 
		try {

				$stmt = $conn->prepare($sql); 
				foreach( $put AS $k => $v ) {
				  $bindParam[] = $v;
				}			
				$bindParam[] = $tabela[4];

				$status = $stmt->execute($bindParam);

				$conn = null;
				echo json_encode($status); 
			} catch(PDOException $e) {
				echo '{"error":{"text":'. $e->getMessage() .'}}'; 
			}
	  }
   }