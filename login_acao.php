<?php
include "conexao.inc";
session_start();
if (isset($_GET['a'])) {
	if ($_GET['a'] == 'log') {
		if (isset($_POST['email1']) && isset($_POST['senha1']) && $_POST['email1'] != "" && $_POST['senha1'] != "") {
			$sql_logar = "SELECT * FROM users WHERE email = '".$_POST['email1']."' AND senha = '".$_POST['senha1']."' ";
			$query_logar = mysqli_query($con,$sql_logar);
			$num = mysqli_num_rows($query_logar);
			if ($num > 0) {
				while ($r = mysqli_fetch_assoc($query_logar)) {
					$_SESSION['usuario_comum'] = $r['nome'];
					$_SESSION['usuario_comum_id'] = $r['id'];
					echo '
<script type="text/javascript">
	alert("Bem-Vindo '.$r['nome'].'");
	location.href = "index.php";
</script>					
					';
				}
				
			}else{
			echo '
<script type="text/javascript">
	alert("Senha e/ou email incorretos!");
	location.href = "login.php";
</script>
			';
			}
		}else{
			echo '
<script type="text/javascript">
	alert("Informe email e senha");
	location.href = "login.php";
</script>
			';
		}
		
	}elseif ($_GET['a'] == 'cad') {
		if (isset($_POST['email2']) && $_POST['email2'] != "") {
			$sql_logar = "SELECT * FROM users WHERE email = '".$_POST['email2']."' AND senha = '".$_POST['senha21']."' ";
			$query_logar = mysqli_query($con,$sql_logar);
			$num = mysqli_num_rows($query_logar);
			if ($num > 0) {
				echo  '
<script type="text/javascript">
	alert("Já há um cadastro com esse email");
	location.href = "login.php";
</script>

				';
			}else {
				if ($_POST['senha21'] === $_POST['senha22']) {
					$sql_cadastrar = "INSERT INTO users VALUES (DEFAULT,'".$_POST['nome']."','".$_POST['senha21']."','".$_POST['email2']."','".$_POST['cpf']."','".$_FILES['foto']['name']."','".$_POST['data']."')";
					$query_cadastrar = mysqli_query($con,$sql_cadastrar);
					if ($query_cadastrar) {
						move_uploaded_file($_FILES['foto']['tmp_name'], "usuarios/".$_FILES['foto']['name']);
						$sql_id = "SELECT LAST_INSERT_ID()";
						$query_id = mysqli_query($con,$sql_id);
						$id = mysqli_fetch_row($query_id);
						$_SESSION['usuario_comum'] = $_POST['nome'];
						$_SESSION['usuario_comum_id'] = $id[0];
						

						echo ' ooo
						<script type="text/javascript">
							alert("Você foi cadastrado com sucesso");
							location.href = "login.php";
						</script>
						';
					}
				}else{
					echo '
						<script type="text/javascript">
							alert("Senhas inconsistentes");
							location.href = "login.php";
						</script>
						';
				}
				
			}
		}
	}
}

?>

