<?php 

   			$user = 'root';
			$pass = 'root123';
			$conn = new PDO("mysql:host=localhost;dbname=testephp", $user, $pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		