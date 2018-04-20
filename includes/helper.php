<?php 
function sanitize($dirty){
	return htmlentities($dirty,END_QUOTES,"UTF-8");
}
?>