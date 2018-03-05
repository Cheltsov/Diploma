<?php
//require "config.php";

	function get_statti() {
		$result = mysqli_query($GLOBALS['db'],"SELECT id,title,date,img_src,discription
											FROM statti");
		if (!$result){
			exit(mysqli_error($GLOBALS['db']));
		}
		if(mysqli_num_rows($result) == 0) {
			exit('Статтей нет');
		}
		$row = array();
		for($i = 0; $i < mysqli_num_rows($result); $i++) {
			$row[] = mysqli_fetch_array($result);
		}				
		return $row;
	}
	
	function get_text($id) {
		$result = mysqli_query("SELECT id,title,date,img_src,text
											FROM statti WHERE id='$id'");
		if (!$result){
			exit(mysqli_error());
		}
		if(mysqli_num_rows($result) == 0) {
			exit('Статтей нет');
		}
		
		
		$row = mysqli_fetch_array($result);
						
		return $row;
	}
	
?>