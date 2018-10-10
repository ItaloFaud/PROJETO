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

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'calc_fim') {
		$cep = $_GET['cep'];
		$tipo = $_GET['tipo'] ;

	$val = (calcular_frete(
	'27410200',
    $cep,
    2,
    $_GET['total'],
    $tipo));

    echo $val->Valor.' '.$val->PrazoEntrega;

    $Compra = $val->Valor+$_GET['total'];

    echo $Compra;

    header("location:confirma_compra.php?frete=".$val->Valor."&valorTot=".$Compra."&prazo=".$val->PrazoEntrega."&id_end=".$_GET['id_end']);


	}if ($_GET['action'] == 'confirma') {
        include "conexao.inc";
        $novo_val = 0;
        $sql_fatura = "INSERT INTO fatura VALUES (DEFAULT,'".$_SESSION['usuario_comum_id']."','".$_GET['id_end']."','".$_GET['valorTot']."','".$_GET['prazo']."','".$_GET['frete']."')";
        $query_fatura = mysqli_query($con,$sql_fatura);
        if ($query_fatura) {
            $sql_id_fatura = "SELECT LAST_INSERT_ID()";
            $query_id_fatura = mysqli_query($con,$sql_id_fatura);
            $id_fatura = mysqli_fetch_row($query_id_fatura);
            foreach ($_SESSION['carrinho'] as $id => $qnt) {
                $sql_pedido = "INSERT INTO pedido VALUES (DEFAULT,'".$id_fatura[0]."','".$id."','".$qnt."')";
                $query_pedido = mysqli_query($con,$sql_pedido);
                if ($query_pedido) {
                    echo "Certo";
                    $sql_atualiza = "SELECT * FROM produtos WHERE id = '".$id."'";
                    $query_atualiza = mysqli_query($con,$sql_atualiza);
                    while ($quant = mysqli_fetch_assoc($query_atualiza)) {
                        $novo_val = $quant['qtd']-$qnt;
                    }
                    $sql_up = "UPDATE produtos SET qtd = '".$novo_val."' WHERE id = '".$id."'";
                    $query_up = mysqli_query($con,$sql_up);
                    if ($query_up) {
                        //session_destroy();
                        unset($_SESSION['carrinho']);
                        //Destroi todas as sessôes
                        echo '
                            <script type="text/javascript">
                                alert("Compra efetuada. Agradeçemos a preferência");
                                location.href = "product.php"
                            </script>
                        ';
                    }
                }
            }
        }
    }
}



 



?>

