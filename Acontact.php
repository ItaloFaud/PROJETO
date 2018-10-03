<?php

include "conexao.inc";

$nome = $_POST['name'];
$phone = $_POST['phone-number'];
$email = $_POST['email'];
$ass = $_POST['assunto'];
$msg = $_POST['messagem'];

$sql = "INSERT INTO contato VALUES (DEFAULT,'$nome','$ass','$email','$phone','$msg')";
$query = mysqli_query($con,$sql);

//Como pegar ultimo id inserido $sql = "SELECT LAST_INSERT_ID()";
// $sql = "SELECT MAX(id) FROM contato";

$sqlbu = "SELECT LAST_INSERT_ID()";
$querybu = mysqli_query($con,$sqlbu);
$res = mysqli_fetch_row($querybu);

$idcontato = $res[0];



$sqlins = "INSERT INTO notificacoes VALUES (DEFAULT,'$idcontato','0')";
$queryins = mysqli_query($con,$sqlins);

if ($query) {
	#ini_set(varname, newvalue);
	mail('italopirata06@gmail.com',$ass,$msg,'From:italopirata06@gmail.com');

	echo '<script type="text/javascript">
	alert("Messagem Entregue!");
	
</script>';


	
}

//Como mandar email para admin do site
//Configurar depois o sendmail
//mail(to, subject, message);
// "SELECT * FROM produtos WHERE nome LIKE '%ma%'"

/* Como procurar
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
  
  <script type="text/javascript">
    $(function(){

      var estados = ["Acre (AC)","Alagoas (AL)","Amapá (AP)","Amazonas (AM)","Bahia (BA)","Ceará (CE)","Distrito Federal (DF)","Espírito Santo (ES)","Goiás (GO)","Maranhão (MA)","Mato Grosso (MT)","Mato Grosso do Sul (MS)","Minas Gerais (MG)","Pará (PA)" ,"Paraíba (PB)","Paraná (PR)","Pernambuco (PE)","Piauí (PI)","Rio de Janeiro (RJ)","Rio Grande do Norte (RN)","Rio Grande do Sul (RS)","Rondônia (RO)","Roraima (RR)","Santa Catarina (SC)","São Paulo (SP)","Sergipe (SE)","Tocantins (TO)"];

      $('#est').autocomplete({
        source : estados
      }); 

    });
  </script>
*/


?>

