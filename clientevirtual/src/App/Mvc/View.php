<?php
   namespace App\Mvc;
   class View
   {
      public function renderLogin()
      {
		 include "pages/indexold.php";
		        
      }
	  
	  public function render($page)
      {  
	     
		 if ($page == "" ){
		 include "pages/index.php";
		 }else{
			 $page = explode("?", $page);
		 include "pages/".$page[0].".php";
		 }
		        
      }
   }