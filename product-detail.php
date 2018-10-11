<?php session_start()?>
<?php 
	if (!isset($_SESSION['carrinho'])) {

		$_SESSION['carrinho'] = array();

	}

	if (isset($_GET['acao'])) {
		
		if ($_GET['acao'] == 'add') {
			
			if (!isset($_SESSION['carrinho'][$_GET['id']])) {
				
				$_SESSION['carrinho'][$_GET['id']] = 1;
				header('location: product.php');

			} else {

				$_SESSION['carrinho'][$_GET['id']] += 1;
				header('location: product.php');

			}

		}

	}
	//session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
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
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<?php include "menuloja.php";?>

	<!-- breadcrumb -->
<!-- 	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.html" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.php" class="s-text16">
			Women
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="#" class="s-text16">
			T-Shirt
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			Boxy T-Shirt with Roll Sleeve Detail
		</span>
	</div> -->

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>
					
					<div class="slick3">
			<?php
			include "conexao.inc";
			
			$imgs = "SELECT * FROM foto WHERE id_produto = '".$_GET['id']."'";
			$queryy = mysqli_query($con,$imgs);
			$i = 1;
			while ($rr = mysqli_fetch_assoc($queryy)) {
				while($i <=3){
				echo '
						<div class="item-slick3" data-thumb="admin/imgs/'.$rr['img'.$i.''].'">
							<div class="wrap-pic-w">
								<img src="admin/imgs/'.$rr['img'.$i.''].'" alt="IMG-PRODUCT">
							</div>
						</div>
				';
				$i++;	
				}
				
			}
			

			?>						



					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
			<?php
			include "conexao.inc";

			$sql = "SELECT * FROM produtos WHERE id = '".$_GET['id']."'";
			$query = mysqli_query($con,$sql);
			while ($r = mysqli_fetch_assoc($query)) {
			$imgs = "SELECT * FROM foto WHERE id_produto = '".$r['id']."'";
			$queryy = mysqli_query($con,$imgs);
			while ($rr = mysqli_fetch_assoc($queryy)) {
				echo '
				<h4 class="product-detail-name m-text16 p-b-13">
					'.$r['nome'].'
				</h4>
				<span class="m-text17">
					R$'.$r['preco'].'
				</span>
				<p class="s-text8 p-t-10">
					'.$r['infos'].'
				</p>				
				';
			}
			}

			?>






				<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Tamanho:
						</div>
						<?php
			$sql = "SELECT * FROM produtos WHERE id = '".$_GET['id']."'";
			$query = mysqli_query($con,$sql);
			while ($r = mysqli_fetch_assoc($query)) {
					echo '
						<div class="s-text15 w-size15 t-center">
							'.$r['tamanho'].'
						</div>

					';
					}						

						?>

<!-- 						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="size">
								<option>Choose an option</option>
								<option>Size S</option>
								<option>Size M</option>
								<option>Size L</option>
								<option>Size XL</option>
							</select>
						</div> -->
					</div>

					<div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center">
							Color:
						</div>
												<?php
			$sql = "SELECT * FROM produtos WHERE id = '".$_GET['id']."'";
			$query = mysqli_query($con,$sql);
			while ($r = mysqli_fetch_assoc($query)) {
					echo '
						<div class="s-text15 w-size15 t-center">
							'.$r['cor'].'
						</div>

					';
					}						

						?>
						

						<!-- <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="color">
								<option>Choose an option</option>
								<option>Gray</option>
								<option>Red</option>
								<option>Black</option>
								<option>Blue</option>
							</select>
						</div> -->
					</div>

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->

								<?php

			$sql = "SELECT * FROM produtos WHERE id = '".$_GET['id']."'";
			$query = mysqli_query($con,$sql);
			while ($r = mysqli_fetch_assoc($query)) {
					echo '
						<a class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" href="?acao=add&id='.$r['id'].'">+Carrinho</a>

					';
				}

								?>
								
								
							</div>
						</div>
					</div>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">SKU: MUG-01</span>
					<span class="s-text8">Categories: Mug, Design</span>
				</div>

				<!--  -->
				

				

				
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	


	<!-- Footer -->
	<?php include "footer.php"; ?>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



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

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
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

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
