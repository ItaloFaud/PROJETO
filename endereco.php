<?php session_start(); include "conexao.inc" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<script type="text/javascript">
	function Pag() {
		$('#modal').modal('show');
	}

</script>
</head>
<body>

<?php include "menuloja.php"?>



<div class="container">
	<br>
	<br>
	<div class="col-md-12">
			<h3>Escolha o endereço a ser usado</h3>
			<p class="lead">Envio efetuado pelo: <?php if ($_GET['tipo'] == '40010') {
				echo "SEDEX";
			}else{
				echo "PAC";
			} ?></p>
	</div>
	<br>
	<br>
	<div class="row">
		<?php

		$sql_end = "SELECT * FROM endereco WHERE id_usuario = '".$_SESSION['usuario_comum_id']."'";
		$query_end = mysqli_query($con,$sql_end);
		$i = 1;
		$re = mysqli_num_rows($query_end);
		while ($results = mysqlI_fetch_assoc($query_end)) {
			if ($i <= $re) {
				echo '

		<div class="col-md-3">
			<div class="card" style="width: 18rem;">
				 <div class="card-header">
				    <a class="badge badge-primary" href="acao_confirma.php?action=calc_fim&cep='.$results['cep'].'&tipo='.$_GET['tipo'].'&id_end='.$results['id'].'&total='.$_GET['tot'].'"> Endereço '.$i.'</a> 
				 </div>
				 <ul class="list-group list-group-flush">
				    <li class="list-group-item">CEP: '.$results['cep'].'</li>
				    <li class="list-group-item">Estado: '.$results['estado'].'</li>
				    <li class="list-group-item">Cidade: '.$results['cidade'].'</li>
				    <li class="list-group-item">Rua/Avenida: '.$results['rua'].'</li>
				    <li class="list-group-item">Número: '.$results['numero'].'</li>
				 </ul>
			</div> 
		</div>		

				';
				$i++;
			}
		}

		?>
		


	</div>

	<br>
	<br>

</div>




<?php include "footer.php";?>


<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>




</body>
</html>
