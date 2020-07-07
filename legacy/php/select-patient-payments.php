<?php
    require "conexao.php";
    
    $idLogin = $_SESSION['idUsuario'];
    $queryId = $_POST['queryId'];

    $query = "SELECT * FROM tb13_movimentacoes_consulta WHERE tb13_id_consulta = ".$queryId." ORDER BY tb13_data_pagamento DESC, tb13_id DESC";
    $response = $conexao->query($query);

    if($response->num_rows>0) { 

      echo "<div class='table-responsive'>
        <table class='table mb-0'>                                            
          <thead>
            <tr>
              <th scope='col' class='border-0'>Valor</th>
              <th scope='col' class='border-0'>Forma de pagamento</th>
              <th scope='col' class='border-0'>Data</th>
            </tr>
          </thead>";

      while ($linha = $response->fetch_assoc()) {                
        echo "<tr>";
          echo "<td>R$ ".str_replace(".",",", number_format($linha["tb13_valor"], 2))."</td>";
          echo "<td>".$linha["tb13_forma_pagamento"]."</td>";
          echo "<td>".date('d/m/Y',strtotime($linha["tb13_data_pagamento"]))."</td>";
        echo "</tr>";  
      }
      
      echo  "</tbody> </table> </div>";

    }else {
        echo "<div style='padding: 10px;display: flex; flex-direction: column; align-items: center;'>";
        echo "<img style='width: 80%; margin: 0 auto' src='assets/images/empty-placeholder/empty-finances-placeholder.png' />";
        echo "<h5 style='margin-top: 15px;text-align: center'>Ainda não há nenhum pagamento nesta consulta</h5>";
        echo "</div>";
    }
?>