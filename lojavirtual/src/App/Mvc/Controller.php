<?php 

	namespace App\Mvc;
	
	class controller
	{
		
		public function index($url, $method, $post, $get, $put)
		{
			$tabela = explode("/", $url);
			
			if ( sizeof($tabela) > 3 ){
				if ($method == 'POST') { //metodo post
					$model = new Model;
					$model->insert($url, $post);
					
				} elseif ($method == 'GET') { //metodo get
					
					$model = new Model;
					$model->select($url, $get);				
					http_response_code(200);
					
				} elseif ($method == 'PUT') { //metodo put
					$model = new Model;
					$model->update($url, $put);
					
				} elseif ($method == 'DELETE') { //metodo delete
					$model = new Model;
					$model->delete($url);
				} else {
					// algum outro tipo de metodo
				}
			} else {
				$view = new View;
				
					echo $view->renderCadastroProdutos();
					
			}
			
			
		}
		
		
	}

?>
