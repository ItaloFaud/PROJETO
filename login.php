<?php
session_start();
 include "conexao.inc";

	/*if (isset($_GET['a'])) {
	if ($_GET['a'] == 'deslogar') {
		
		session_destroy();
		unlink($_SESSION['usuario']);
		echo '
		<script type="text/javascript">
		alert("Deslogado com sucesso!");
		location.href = "index.php";
		</script>

		';
	}*/



?>

<!DOCTYPE html>
<html>
<head>
	<title>Login e Cadastro</title>
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
</head>
<body>


<?php include "menuloja.php";?>


	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-06.jpg);">
		<h2 class="l-text2 t-center">
			Login e Cadastro
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<?php 
					if (isset($_SESSION['usuario_comum']) && $_SESSION['usuario_comum'] != "") {
						echo '
						<div class="col-md-12 p-b-30">
						<h4>Você já está logado!</h4>
						<h6>Volte aqui quando precisar logar novamente</h6>
						</div>
						';
						
					}else{
						echo '
				<div class="col-md-6 p-b-30">
					<form class="leave-comment" action="login_acao.php?a=log"  method="post">
						<h4>Login
						</h4>
						<br>
						<label>Email</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email1" placeholder="Email">
						</div>

						
						<label>Senha</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="senha1" placeholder="Sua senha aqui">
						</div>

						<br>
						

						

						<div class="w-size25">
							<!-- Button -->
							<input type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" value="Logar" name="">
						</div>
					</form>
				</div>
								<div class="col-md-6 p-b-30">
					<form action="login_acao.php?a=cad" class="leave-comment" enctype="multipart/form-data" method="post">
						<h4>Cadastro
						</h4>
						<br>

						<label>Nome completo</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required="" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nome" placeholder="Nome Completo">
						</div>

						<label>Data de Nascimento</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required="" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="data" placeholder="Data de Nascimento EX: 2001-12-31">
						</div>

						<label>Email</label>	
						<div class="bo4 of-hidden size15 m-b-20">
							<input required="" class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email2" placeholder="Email">
						</div>

						<label>CPF</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required="" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cpf" placeholder="CPF">
						</div>
						
						<label>Senha</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required="" class="sizefull s-text7 p-l-22 p-r-22" type="password" name="senha21" placeholder="Senha">
						</div>
						
						<label>Repita sua senha</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required="" class="sizefull s-text7 p-l-22 p-r-22" type="password" name="senha22" placeholder="Repita sua senha">
						</div>

						<label>Foto de perfil</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required="" class="sizefull s-text7 p-l-22 p-r-22" type="file" name="foto" placeholder="Repita sua senha">
						</div>

						<br>
						

						
						<div class="w-size25">
							<!-- Button -->
							<input type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" value="Cadastrar" name="">
						</div>
					</form>
				</div>

						';
						

					}

				 ?>
					
			</div>
		</div>
	</section>


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
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>




</body>
</html>