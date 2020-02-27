<?php

	require "conexao.php";
	
  $idLogin = $_SESSION["idUsuario"];
  $queryId = $_POST["queryId"];

  $paid = mysqli_real_escape_string($conexao, trim($_POST["paid"]));
  $payment = mysqli_real_escape_string($conexao, trim($_POST["payment"]));

  //CONVERTER A DATA DO PADRAO BRASILEIRO PARA O FORMATO DO BANCO DE DADOS
	$date = mysqli_real_escape_string($conexao, trim(str_replace('/', '-', $_POST["date"])));
	$convedted_date = date("Y-m-d", strtotime($date));

  // ATUALIZA O VALOR PAGO DA CONSULTA
  $query = "UPDATE tb07_consultas SET tb07_valor_pago = tb07_valor_pago + ".$paid." WHERE tb07_id = ".$queryId;
  $result = mysqli_query($conexao, $query);

  // CONSULTA PARA VERIFICAR COM QUAL STATUS A CONSULTA IRA RECEBER (1 - PAG. PARCIAL | 2 - QUITADO)
  $query = "SELECT tb07_valor, tb07_valor_pago, tb01_nome FROM tb07_consultas, tb01_pacientes WHERE tb01_id = tb07_id_paciente AND tb07_id = " .$queryId;
  $result = $conexao->query($query);

  $status = 0;
  $patient_name = "";
  
  if($result->num_rows>0) {
    while ($linha = $result->fetch_assoc()) { 
      $patient_name = $linha["tb01_nome"];
      if ($linha["tb07_valor_pago"] == $linha["tb07_valor"]) {
        $status = 2;
      } else {
        $status = 1;
      }
    }
  }

  // ATUALIZA O STATUS DE PAGAMENTO DA CONSULTA
  $query = "UPDATE tb07_consultas SET tb07_status_pagamento = ".$status." WHERE tb07_id = ".$queryId;
  $result = mysqli_query($conexao, $query);

  // REGISTRA A MOVIMENTAÇÃO
  $query = "INSERT INTO tb13_movimentacoes_consulta (tb13_id_consulta, tb13_valor, tb13_forma_pagamento, tb13_data_pagamento) VALUES (".$queryId.", ".$paid.", '".$payment."', '".$convedted_date."');";
  $result = mysqli_query($conexao, $query);

  // REGISTRA O ITEM NO FINANCEIRO
  $query = "INSERT INTO tb05_financeiro (tb05_id_usuario, tb05_id_consulta, tb05_nome, tb05_tipo, tb05_valor, tb05_data) VALUES ($idLogin, $queryId, 'Pagamento de ".$patient_name."', '1', ".$paid.", '".$convedted_date."');";
  $result = mysqli_query($conexao, $query);
?>