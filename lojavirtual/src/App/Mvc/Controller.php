<?php 

	namespace App\Mvc;
	
	class controller
	{
		
		public function index($url, $method, $post, $get, $put)
		{
				if ($method == 'POST') {
					$model = new Model;
					$model->insert($url, $post);
					
				} elseif ($method == 'GET') {
					
					$model = new Model;
					$model->select($url, $get);
					$view = new View;
					//$view->render($model->select());
					http_response_code(200);
					
				} elseif ($method == 'PUT') {
					$model = new Model;
					$model->update($url, $put);
					
				} elseif ($method == 'DELETE') {
					$model = new Model;
					$model->delete($url);
				} else {
					// Method unknown
				}
			
			
		}
		
		
	}

?>
