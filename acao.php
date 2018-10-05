<?php
session_start();

	function calcular_frete(
	$cep_origem,
    $cep_destino,
    $peso,
    $valor,
    $tipo_do_frete,
    $altura = 6,
    $largura = 20,
    $comprimento = 20){
 
 
    $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
    $url .= "nCdEmpresa=";
    $url .= "&sDsSenha=";
    $url .= "&sCepOrigem=" . $cep_origem;
    $url .= "&sCepDestino=" . $cep_destino;
    $url .= "&nVlPeso=" . $peso;
    $url .= "&nVlLargura=" . $largura;
    $url .= "&nVlAltura=" . $altura;
    $url .= "&nCdFormato=1";
    $url .= "&nVlComprimento=" . $comprimento;
    $url .= "&sCdMaoProria=n";
    $url .= "&nVlValorDeclarado=" . $valor;
    $url .= "&sCdAvisoRecebimento=n";
    $url .= "&nCdServico=" . $tipo_do_frete;
    $url .= "&nVlDiametro=0";
    $url .= "&StrRetorno=xml";
 
    //Sedex: 40010
    //Pac: 41106
 
    $xml = simplexml_load_file($url);
 
    return $xml->cServico;
 
}

if ($_GET['acao'] == 'calc') {
	if (isset($_POST['cep'])) {
$cep = $_POST['cep'];
$tipo = $_POST['tipo'] ;

$val = (calcular_frete(
	'27410200',
    $cep,
    2,
    $_GET['preco'],
    $tipo));
 
echo "Valor: R$ ".$val->Valor.'  '.$val->PrazoEntrega;
header('location: cart.php?frete='.$val->Valor.'&prazo='.$val->PrazoEntrega	);
}

}else{
	foreach ($_SESSION['carrinho'] as $id => $qnt) {
	if (isset($_GET['id'.$id])) {
	if ($qnt ==  $_GET['id'.$id]) {
	echo "OI";	
	}else{
		$_SESSION['carrinho'][$id] = $_GET['id'.$id];
	}
	}


}
header('location:cart.php');
}

if(isset($_GET['email1'])){
    include "conexao.inc";

    session_start();
    if (isset($_GET['email1'])) {
        $sql_logar = "SELECT * FROM users WHERE email = '".$_GET['email1']."' AND senha = '".$_GET['senha1']."' ";
        $query_logar = mysqli_query($con,$sql_logar);
        if (mysqli_num_rows($query_logar) > 0) {
            while($pessoa =  mysqli_fetch_assoc($query_logar)){
                echo '
<script type="text/javascript">
    alert("Bem-vindo "'.$pessoa['nome'].');
    location.href = "index.php";
</script>
            ';
            }
            
            
        }
    }else{

    }
}




?>