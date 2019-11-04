<?php
    require "conexao.php";
    
    $idLogin = $_SESSION['idUsuario'];

    $queryselect = "select * from tb05_financeiro where tb05_idUsuario = '$idLogin' order BY tb05_situacao, tb05_data";
    $resultadoselect = $conexao->query($queryselect);

    if($resultadoselect->num_rows>0) { 

        echo    "<div class='table-responsive'>
                    <table class='table mb-0'>
                        <thead class='bg-light'>
                            <tr>
                                <th scope='col' class='border-0'></th>
                                <th scope='col' class='border-0'>Nome</th>
                                <th scope='col' class='border-0'>Valor</th>
                                <th scope='col' class='border-0'>Data</th>
                                <th scope='col' class='border-0'>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";

        while ($linha = $resultadoselect->fetch_assoc()){                
            echo "<tr>";
                echo "<td>";
                    if($linha["tb05_tipo"] == 0){
                        echo "<i class='material-icons' style='color: red'>call_made</i>";
                    }else{
                        echo "<i class='material-icons' style='color: #32a852'>call_received</i>";
                    }
                echo "</td>";
                echo "<td>".$linha["tb05_nome"]."</td>";                
                echo "<td>R$ ". str_replace(".",",", number_format($linha["tb05_valor"],2))."</td>";
                echo "<td>".  date('d/m/Y',strtotime($linha["tb05_data"])) ."</td>";
                echo "<td>";
                    if($linha["tb05_situacao"] == 0){
                        echo "<a href='#' class='btn'>Efetuar baixa</a>";
                    }else{
                        echo "<i class='material-icons' style='color: #32a852'>check_circle</i>";
                    }
                echo "</td>";
                /*echo "<td>";
                echo "<button type='button' class='mb-2 btn btn-sm btn-success mr-1 view-modal' id='".$linha["tb02_idProduto"]."'
                    data-id='".$linha["tb02_idProduto"]."'
                    data-name='".$linha["tb02_produto"]."'
                    data-price='".$linha["tb02_preco"]."'
                    data-amount='".$linha["tb02_quantidade"]."'
                    style='color: white'>Editar/Adicionar/Remover</button>";
                echo "</td>";*/
            echo "</tr>";  
        }
        
        
            echo        "</tbody>
                </table>
        </div>";
        
    }else {
        echo "<div style='padding: 10px;' >";
        echo "<img style='width: 80%;' src='assets/images/empty-finances-placeholder.png' />";
        echo "<h5 style='margin-top: 15px;'>Ainda não há registros no financeiro</h5>";
        echo "</div>";
    }        


?>