<!-- REQUIRE(), SESSION_START() E ERROR_REPORTING(0) -->
<?php
    error_reporting(0);
    include'conexao.inc';
    session_start();

    //VERIFICAR SESSION
 /* if (!isset($_SESSION['user'])) {

    header('location: login.php');

  }*/
?>
<!-- /REQUIRE() E SESSION_START() -->
<?php 
 /* //Busca dados
  $sql = "SELECT * FROM usuarios WHERE usuario = '".$_SESSION['user']."'";
  $query = mysqli_query($conexao, $sql);

  while ($dados = mysqli_fetch_assoc($query)) {
  	
  	$nome = $dados['nome'];

  	if ($dados['url_perfil'] != "") {

  		$img_perfil = $dados['url_pefil'];

  	} else {

  		$img_perfil = "perfil.png";

  	}

  }*/
?>
<!-- Carrrinho -->
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
<!--/Carrrinho -->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

<?php include "menuloja.php"?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/heading-pages-002.jpg);">
		<h2 class="l-text2 t-center">
			Women
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Women Collection 2018
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Filtrar por categoria
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="product.php?pagina=1" class="s-text13 active1">
									TODOS
								</a>
							</li>
							<!-- Busca categorias -->
							<?php 

								$sql_busca_categorias = "SELECT * FROM categoria";
								$query_busca_categorias = mysqli_query($con, $sql_busca_categorias);

								while ($dados_busca_categorias = mysqli_fetch_assoc($query_busca_categorias)) {

									echo '<li class="p-t-4">
										<a href="?filtra='.$dados_busca_categorias['id'].'" class="s-text13">
											'.$dados_busca_categorias['nome'].'
										</a>
									</li>';
								    
								}

							?>							
							
						</ul>

						<!--  -->
						<!--<h4 class="m-text14 p-b-32">
							Filters
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
								</div>
							</div>
						</div>-->

						<div class="filter-color p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-12">
								Color
							</div>

							<ul class="flex-w">
								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter1" type="checkbox" name="color-filter1">
									<label class="color-filter color-filter1" for="color-filter1"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter2" type="checkbox" name="color-filter2">
									<label class="color-filter color-filter2" for="color-filter2"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter3" type="checkbox" name="color-filter3">
									<label class="color-filter color-filter3" for="color-filter3"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter4" type="checkbox" name="color-filter4">
									<label class="color-filter color-filter4" for="color-filter4"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter5" type="checkbox" name="color-filter5">
									<label class="color-filter color-filter5" for="color-filter5"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter6" type="checkbox" name="color-filter6">
									<label class="color-filter color-filter6" for="color-filter6"></label>
								</li>

								<li class="m-r-10">
									<input class="checkbox-color-filter" id="color-filter7" type="checkbox" name="color-filter7">
									<label class="color-filter color-filter7" for="color-filter7"></label>
								</li>
							</ul>
						</div>

						<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
						<script>
					        $(document).ready(function(){

					            $('#search-product').keyup(function(){

					                $('#form').submit(function(){

					                    var dados = $(this).serialize();

					                    $.ajax({

					                        url: 'processa.php',
					                        type: 'POST',
					                        dataType: 'html',
					                        data: dados,
					                        success: function(data){

					                            $('#resultado').empty().html(data);

					                        }

					                    });

					                    return false;

					                });

					                $('#form').trigger('submit');

					            });


					        });
					    </script>

						<div class="search-product pos-relative bo4 of-hidden">
							<form id="form">
								<input class="s-text7 size6 p-l-23 p-r-50" type="text" id="search-product" name="search-product" placeholder="Search Products...">

								<!--<button type="submit" class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
									<i class="fs-12 fa fa-search" aria-hidden="true"></i>
								</button>-->
							</form>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<script>
								function FiltrarPorOndemDePreco(){

									var ordem = document.getElementById('ordem_preco').value;

									location.href = 'product.php?pagina=1&ordem='+ordem;

								}
							</script>
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting" id="ordem_preco" onchange="FiltrarPorOndemDePreco()">
									<option>Default Sorting</option>
									<option>Popularity</option>
									<option value="DESC">Price: low to high</option>
									<option value="ASC">Price: high to low</option>
								</select>
							</div>

							<script>
								function FiltrarPorValor(){

									var valor = document.getElementById('valor').value;

									min = parseInt(valor);

									if (valor < 200) {

										var max = min + 50;
										location.href = 'product.php?pagina=1&min='+min+'&max='+max;

									} else {

										location.href = 'product.php?pagina=1&min='+min;

									}

								}
							</script>

							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting" onchange="FiltrarPorValor()" id="valor">
									<option>Price</option>
									<option value="0">R$ 0.00 - R$ 50.00</option>
									<option value="50">R$ 50.00 - R$ 100.00</option>
									<option value="100">R$ 100.00 - R$ 150.00</option>
									<option value="150">R$ 150.00 - R$ 200.00</option>
									<option value="200">R$ 200.00+</option>

								</select>
							</div>
						</div>

						<!--<span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span>-->
					</div>

					<!-- Product -->
					<div class="row" id="resultado">
						<?php 

							//Paginacao
							$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
							$limite = 6;

							$sqlT = "SELECT * FROM produtos";
							$queryT= mysqli_query($con, $sqlT);
							$total = mysqli_num_rows($queryT);

							$numPagina = ceil($total/$limite);
							$inicio = $pagina - 1;
							$inicio = ($inicio*$numPagina);

							$where = " LIMIT $inicio, $limite";
														

							if (isset($_GET['filtra'])) {
								
								$where = " WHERE id_cat = '".$_GET['filtra']."'";

							} elseif (isset($_GET['min']) && isset($_GET['max'])) {
								
								$where = " WHERE preco >= ".$_GET['min']." AND preco <= ".$_GET['max'];

							} elseif (isset($_GET['min'])) {
								
								$where = " WHERE preco >= ".$_GET['min'];

							} elseif (isset($_GET['ordem'])) {
								
								$where = " ORDER BY preco ".$_GET['ordem'];

							}

							$slq_busca_produtos = "SELECT * FROM produtos".$where;
							$query_busca_produtos = mysqli_query($con, $slq_busca_produtos);
							$rows = mysqli_num_rows($query_busca_produtos);

							if (mysqli_num_rows($query_busca_produtos) > 0) {

								while ($dados_busca_produtos = mysqli_fetch_assoc($query_busca_produtos)) {

									//$img = explode("-", $dados_busca_produtos['url_img']);

									$sql = "SELECT * FROM foto WHERE id_produto = '".$dados_busca_produtos['id']."'";
									$query = mysqli_query($con,$sql);
									while ($dados = mysqli_fetch_assoc($query)) {
										echo '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
										<!-- Block2 -->
										<div class="block2">
											<div class="block2-img wrap-pic-w of-hidden pos-relative">
												<img style="width: 270px; height: 300px;" src="admin/imgs/'.$dados['img1'].'" alt="IMG-PRODUCT">

												<div class="block2-overlay trans-0-4">
													<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
														<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
														<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
													</a>

													<div class="block2-btn-addcart w-size1 trans-0-4">
														<!-- Button -->
														<a class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" href="?acao=add&id='.$dados_busca_produtos['id'].'">
															+Carrinho
														</a>
													</div>
												</div>
											</div>

											<div class="block2-txt p-t-20">
												<a href="product-detail.php?id='.$dados_busca_produtos['id'].'" class="block2-name dis-block s-text3 p-b-5">
													'.$dados_busca_produtos['nome'].'
												</a>

												<span class="block2-price m-text6 p-r-5">
													R$ '.number_format($dados_busca_produtos['preco'], 2, ',', '.').'
												</span>
											</div>
										</div>
									</div>';
									}
									
									

								}

							} else {

								echo '<h3>Nenhum produto encontrado</h3>';

							}


				
						?>
						
						

				</div>
				<div class="pull-right"><?php echo mysqli_num_rows($query_busca_produtos)." resultado(s)"; ?></div>
				<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
					<?php 
						for ($i=1; $i <= $numPagina ; $i++) {
							if ($_GET['pagina'] == $i) { 
								echo '<a href="?pagina='.$i.'" class="item-pagination flex-c-m trans-0-4 active-pagination">'.$i.'</a>';
							} else {
								echo '<a href="?pagina='.$i.'" class="item-pagination flex-c-m trans-0-4">'.$i.'</a>';
							}
						}
					?>
					</div>
					<!--<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>-->
			</div>
		</div>
	</section>


	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<!--<li class="p-b-9">
						<a href="product.php" class="s-text13 active1">
							TODOS
						</a>
					</li>-->
					<!-- Busca categorias -->
					<?php 

						$sql_busca_categorias = "SELECT * FROM categoria LIMIT 5";
						$query_busca_categorias = mysqli_query($conexao, $sql_busca_categorias);

						while ($dados_busca_categorias = mysqli_fetch_assoc($query_busca_categorias)) {

							echo '<li class="p-b-9">
								<a href="?filtra='.$dados_busca_categorias['id'].'" class="s-text7">
									'.$dados_busca_categorias['nome'].'
								</a>
							</li>';
								    
						}

					?>	
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				NeoCopyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



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
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
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
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
