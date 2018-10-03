<?php
              include "conexao.inc";
              if (isset($_GET['a'])) {
              	if ($_GET['a'] == '1') {
              $sql = "SELECT * FROM notificacoes WHERE status = '0'";
              $query = mysqli_query($con,$sql);

              $Noti = mysqli_num_rows($query);
 
              echo $Noti;
              	}
              	if ($_GET['a'] == '2') {
              		
              $sql = "SELECT * FROM notificacoes WHERE status = '0'";
              $query = mysqli_query($con,$sql);

              $Noti = mysqli_num_rows($query);

              echo 'Você tem '.$Noti.' mensagens';
          
              	}
              }

              
?>