<?php 
	
	require 'conexao.inc';

	$slq_busca_produtos = "SELECT * FROM produtos WHERE nome LIKE '%".$_POST['search-product']."%' ORDER BY nome ASC";
	$query_busca_produtos = mysqli_query($con, $slq_busca_produtos);
	$rows = mysqli_num_rows($query_busca_produtos);

	if (mysqli_num_rows($query_busca_produtos) > 0) {

		while ($dados_busca_produtos = mysqli_fetch_assoc($query_busca_produtos)) {
			//$img = explode("-", $dados_busca_produtos['url_img']);
			$slq_busca_foto = "SELECT * FROM foto WHERE id_produto = '".$dados_busca_produtos['id']."'";
			$query_busca_foto = mysqli_query($con, $slq_busca_foto);
			while ($foto = mysqli_fetch_assoc($query_busca_foto)) {
			 	echo '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
				<!-- Block2 -->
				<div class="block2">
					<div class="block2-img wrap-pic-w of-hidden pos-relative">
						<img style="width: 270px; height: 300px;" src="admin/imgs/'.$foto['img1'].'" alt="IMG-PRODUCT">

						<div class="block2-overlay trans-0-4">
							<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
								<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
								<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
							</a>

							<div class="block2-btn-addcart w-size1 trans-0-4">
							<!-- Button -->
								<a class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" href="?acao=add&id='.$dados_busca_produtos['id'].'">
									Add to Cart
								</a>
							</div>
						</div>
					</div>

					<div class="block2-txt p-t-20">
						<a href="product-detail.php?produto='.$dados_busca_produtos['id'].'" class="block2-name dis-block s-text3 p-b-5">
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