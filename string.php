<?php 
	$str = "sfw165 1we1c15 er3vce5t";
	echo $str.'<br> do dai chuoi: '.strlen($str);
	echo '<br> dao nguoc : '.strrev($str);
	echo '<br> tim vi tri tu : '.strpos($str,'1we');
	echo '<br> thay the : '.str_replace('1we1c15', "word replace", $str);
 ?>