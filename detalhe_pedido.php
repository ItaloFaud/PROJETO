<?php session_start(); include "conexao.inc" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Detalhes do pedido</title>
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
			<h3>Resumo do Pedido</h3>
			
	</div>
<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<form method="get" action="acao.php">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
						</tr>
						<?php
						
						
						$total = 0;

						
						$sql_fatura = "SELECT * FROM fatura WHERE id = '".$_GET['id_fatura']."'";
						$query_fatura = mysqli_query($con,$sql_fatura);
						$fatura = mysqli_fetch_assoc($query_fatura);

						$sql_pedido = "SELECT * FROM pedido WHERE id_fatura = '".$fatura['id']."'";
						$query_pedido = mysqli_query($con,$sql_pedido);

						while($pedido = mysqli_fetch_assoc($query_pedido)){
							
							$sql_produto = "SELECT * FROM produtos WHERE id = '".$pedido['id_produto']."'";
							$query_produto = mysqli_query($con,$sql_produto);

							while($produto = mysqli_fetch_assoc($query_produto)){
								
								$sql_foto = "SELECT * FROM foto WHERE id_produto = '".$pedido['id_produto']."'";
								$query_foto = mysqli_query($con,$sql_foto);
								
								while ($foto = mysqli_fetch_assoc($query_foto)) {
									$minitotal = $pedido['qtn']*$produto['preco'];
									echo '
									<tr class="table-row">
										<td class="column-1">
											<div class="cart-img-product b-rad-4 o-f-hidden">
												<img src="admin/imgs/'.$foto['img1'].'" alt="IMG-PRODUCT">
											</div>
										</td>
										<td class="column-2">'.$produto['nome'].'</td>
										<td class="column-3">$'.number_format($produto['preco'],2,",",".").'</td>
										<td class="column-4">
											<div class="flex-w bo5 of-hidden w-size17">
												

												<input disabled class="size22 m-text18 t-center num-product" type="number" value="'.$pedido['qtn'].'">

												
											</div>
										</td>
										<td class="column-5">$'.number_format($minitotal,2,",",".").'</td>
									</tr>
									';
								}
							}

						}

						
						?>
					</table>
				</div>
			</div>
			<br>
			<div class="row">
		<?php

		$sql_end = "SELECT * FROM endereco WHERE id = '".$_GET['id_endereco']."'";
		$query_end = mysqli_query($con,$sql_end);
		$i = 1;
		$re = mysqli_num_rows($query_end);
		while ($results = mysqlI_fetch_assoc($query_end)) {
			
				echo '

		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				 <div class="card-header">
				    <a class="badge badge-primary" href="">Endereço de entrega</a> 
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
				
			
		}
		error_reporting(0);
		$valor = number_format(ceil($_GET['frete']),2,",",".");
		$Subtotalll = $total+$valor;
		?>

		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				 <div class="card-header">
				    <a class="badge badge-warning" href="">Informações da compra</a> 
				 </div>
				 <ul class="list-group list-group-flush">
				 	 <li class="list-group-item">Custo do frete: R$<?php echo number_format($fatura['frete'],2,",","."); ?></li>
				 	<li class="list-group-item">Subtotal: R$<?php echo number_format($fatura['valor'],2,",","."); ?></li>
				    <li class="list-group-item">Prazo de Entrega: <?php echo $fatura['prazo']; ?> dias</li>

				    
				    
				 </ul>
			</div> 
		</div>

		

		
			

			</div>
			</div>
		</div>
	</section>
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
