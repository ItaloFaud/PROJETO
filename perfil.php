<?php session_start();
include "conexao.inc";
if (isset($_POST['senhatu']) && $_POST['senhatu'] != "" && isset($_POST['novasenha']) && $_POST['novasenha'] != "" && isset($_POST['novasenha1']) && $_POST['novasenha1'] != "" && $_FILES['foto']['name'] != "") {
		$sql_confirma = "SELECT senha FROM users WHERE id = '".$_SESSION['usuario_comum_id']."' ";
		$query_confirma = mysqli_query($con,$sql_confirma);
		$senha = mysqli_fetch_row($query_confirma);
		if ($_POST['novasenha'] == $_POST['novasenha1'] && $_POST['senhatu'] == $senha[0]) {
			$sql_up = "UPDATE users SET senha = '".$_POST['novasenha']."' ,foto = '".$_FILES['foto']['name']."' WHERE id = '".$_SESSION['usuario_comum_id']."'";
			$query_up = mysqli_query($con,$sql_up);
			
				echo '
		<script type="text/javascript">
			alert("Nada");
		</script>
		';
		if ($query_up) {
			# code...
			move_uploaded_file($_FILES['foto']['tmp_name'], "usuarios/".$_FILES['foto']['name']);
				echo '
		<script type="text/javascript">
			alert("Conta atualizada");
		</script>
		';
		}
				
			

			
		}else{
		echo '
		<script type="text/javascript">
			alert("Senhas inconsistentes");
		</script>
		';
		}




	//echo '
	//<script type="text/javascript">
	//alert("OIIIIIII");
	//</script>
	//';
}
?>

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

	function endereco() {
		$('#2').modal('show');
	}

	function Ped(){
		location.href = "pedidos.php";
	}
</script>
</head>
<body>

<?php include "menuloja.php"?>
<!-- Titulo da pagina -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-06.jpg);">
		<h2 class="l-text2 t-center">
			Perfil
		</h2>
	</section>

						



	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">

				

						

				

				<?php 
				include "conexao.inc";
					if (isset($_SESSION['usuario_comum_id']) && isset($_SESSION['usuario_comum']) && $_SESSION['usuario_comum'] != "") {
						$sql_info = "SELECT * FROM users WHERE id = '".$_SESSION['usuario_comum_id']."'";
						$query_info = mysqli_query($con,$sql_info);
						while($info = mysqli_fetch_assoc($query_info)){
							echo '
						<div class="col-md-4 p-b-30">
							<h4>Foto de perfil</h4>
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img style="width: 270px; height: 300px;" src="usuarios/'.$info['foto'].'" alt="IMG-PRODUCT">
							</div>	
						</div>
						<div class="col-md-8 p-b-30">
							<h4>Dados pessoais</h4>
							<br>
							<div class="col-md-12 p-b-30">
								<h5>Nome: <label>'.$info['nome'].'</label></h5>
								<h5>Email: <label>'.$info['email'].'</label></h5>
								<h5>CPF: <label>'.$info['CPF'].'</label></h5>
								<h5>Data de nascimento: <label>'.$info['nasc'].'</label></h5>
							</div>
							<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" onclick="Pag()">Editar</button>
						</div>
						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" onclick="Ped()">Ver pedidos</button>
						</div

						
							
						</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4>Editar Perfil</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="leave-comment" method="post" enctype="multipart/form-data">
						<br>

						<label>Nome Completo</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input disabled value="'.$info['nome'].'" class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nome" placeholder="Email">
						</div>

						<label>Email</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input disabled value="'.$info['email'].'" class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email">
						</div>

						
						<label>Senha Atual</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="senhatu" placeholder="Sua senha atual aqui">
						</div>

						<label>Nova senha</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="novasenha" placeholder="Sua nova senha aqui">
						</div>

						<label>Repita sua nova senha</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="novasenha1" placeholder="Insira a nova senha aqui">
						</div>

						<label>CPF</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input value="'.$info['CPF'].'" disabled class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cpf" placeholder="Sua senha aqui">
						</div>

						<label>Data de Nascimento</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input disabled value="'.$info['nasc'].'" disabled class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nasc" placeholder="Sua senha aqui">
						</div>

						<label>Foto de Perfil</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required="" value="'.$info['foto'].'" class="sizefull s-text7 p-l-22 p-r-22" type="file" name="foto">
						</div>

						<br>
						

						

						<div class="w-size25">
							<!-- Button -->
							<input type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" value="Confirmar">
						</div>
					</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>	
					';
						}

					echo "</div>";



					$sql_end = "SELECT * FROM endereco WHERE id_usuario = '".$_SESSION['usuario_comum_id']."'";
					$query_end = mysqli_query($con,$sql_end);

						if (mysqli_num_rows($query_end) > 0) {
							echo '
								<h4>Endereços</h4>
								<br>
								<table class="table">
	  								<thead>
									    <tr>
									      <th scope="col">#</th>
									      <th scope="col">CEP</th>
									      <th scope="col">Estado</th>
									      <th scope="col">Cidade</th>
									      <th scope="col">Rua</th>
									      <th scope="col">Número</th>
									    </tr>
								  </thead>
								  <tbody>
							';
							while ($results = mysqli_fetch_assoc($query_end)) {
								echo '
								<tr>
							      <th scope="row">'.$results['id'].'</th>
							      <td>'.$results['cep'].'</td>
							      <td>'.$results['estado'].'</td>
							      <td>'.$results['cidade'].'</td>
							      <td>'.$results['rua'].'</td>
							      <td>'.$results['numero'].'</td>
							    </tr>
								';
						}
							echo '</tbody>
								</table>
								<button onclick="endereco()" class="badge badge-info">Adicionar endereço</button>
								<!-- Modal -->
<div class="modal fade" id="2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4>Endereço</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="leave-comment" method="post" action="Acaoes.php?a=end">
						<br>

						<label>CEP</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cep" placeholder="Insira aqui seu cep">
						</div>

						<label>Estado</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="estado" placeholder="Insira seu estado aqui">
						</div>

						
						<label>Cidade</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cidade" placeholder="Sua cidade aqui">
						</div>


						<label>Rua/Avenida</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="rua" placeholder="Insira a sua rua/avenida aqui">
						</div>

						<label>Número</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="number" name="num" placeholder="O número de sua casa aqui">
						</div>


						<br>
						

						

						<div class="w-size25">
							<!-- Button -->
							<input type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" value="Inserir">
						</div>
					</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>'
								;

						}else{
							echo '
							<br>
							<div class="col-md-12 p-b-30">
							<h4>Endereços</h4>
								<p>Você não possui endereços ligados a você</p>
								<button onclick="endereco()" class="badge badge-info">Adicionar endereço</button>
							</div>

							<!-- Modal -->
<div class="modal fade" id="2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4>Endereço</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="leave-comment" method="post" action="Acaoes.php?a=end">
						<br>

						<label>CEP</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cep" placeholder="Insira aqui seu cep">
						</div>

						<label>Estado</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="estado" placeholder="Insira seu estado aqui">
						</div>

						
						<label>Cidade</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="cidade" placeholder="Sua cidade aqui">
						</div>


						<label>Rua/Avenida</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="text" name="rua" placeholder="Insira a sua rua/avenida aqui">
						</div>

						<label>Número</label>
						<div class="bo4 of-hidden size15 m-b-20">
							<input required class="sizefull s-text7 p-l-22 p-r-22" type="number" name="num" placeholder="O número de sua casa aqui">
						</div>


						<br>
						

						

						<div class="w-size25">
							<!-- Button -->
							<input type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" value="Inserir">
						</div>
					</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
							';
						
						}

					


					}else{
	echo '
						
	<div class="col-md-12 p-b-30">
		<h4>Você não está logado!</h4>
		<h6>Volte aqui quando estiver logado</h6>
	</div>
	</div>
					';
					}
				?>

		<?php

			

		?>
			
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

<!--===============================================================================================-->
	<script src="js/main.js"></script>




</body>
</html>




