<?php
   require 'vendor/autoload.php';
   $controller = new App\Mvc\Controller();
   parse_str( file_get_contents( 'php://input' ), $_PUT );
   $controller->index($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], $_POST, $_GET, $_PUT);   
 