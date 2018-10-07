<?php 
session_start();
include "conexao.inc";
if (isset($_GET['a'])) {
	if ($_GET['a'] == 'end') {
		echo '
			
				alert("a");

				
			
			';

			//echo $_POST['num'];

			//echo //$_SESSION['usuario_comum_id'];,'".$_POST['cep']."','".$_POST['estado']."','".$_POST['cidade']."','".$_POST['rua']."','".$_POST['num']."';
		$sql_insert = "INSERT INTO endereco VALUES (DEFAULT,'".$_SESSION['usuario_comum_id']."','".$_POST['cep']."','".$_POST['estado']."','".$_POST['cidade']."','".$_POST['rua']."','".$_POST['num']."')";
		$query_insert = mysqli_query($con,$sql_insert);
		if ($query_insert) {
			//  
			echo '
				<script type="text/javascript">
				alert("Endereço associado!");
				location.href = "perfil.php";
				</script>
				
			
			';
		}
	}
					
	}					

?>

