<?php
include "conexao.inc";
if (isset($_GET['a'])) {
	$sql = "SELECT * FROM produtos WHERE nome LIKE '%".$_GET['nome']."%'";
	$query = mysqli_query($con,$sql);
	while ($r = mysql_fetch_assoc($query)) {
				echo $r['nome'];
			}		
	
}


?>