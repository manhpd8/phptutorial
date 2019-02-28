<?php
	$arrColor = array("dsf","sdf","hjh");
	foreach ($arrColor as $arr) {
		echo "$arr <br>";
	}
	/**
	 * 
	 */
	class Books {
      /* Member variables */
      var $price;
      var $title;
      
      /* Member functions */
      function __Books(){
      	$title="d";
      }
      function setPrice($par){
         $this->$price = $par;
      }
      
      function getPrice(){
         echo $this->$price ."<br/>";
      }
      
      public function setTitle($par){
         $this->title = $par;
      }
      
      function getTitle(){

         return $this->title;
      }
   }

   $english = new Books;
   $english->setTitle("english title");
   echo $english->getTitle()."sdf";

 ?>