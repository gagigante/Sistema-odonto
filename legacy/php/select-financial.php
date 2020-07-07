<?php
    require "conexao.php";
    
    $idLogin = $_SESSION['idUsuario'];

    $query = "SELECT * FROM tb05_financeiro WHERE tb05_id_usuario = '$idLogin' ORDER BY tb05_data DESC";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 

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

        while ($linha = $result->fetch_assoc()){                
            echo "<tr>";
                echo "<td>";
                    if($linha["tb05_tipo"] == false){
                        echo "<i class='material-icons' style='color: red'>call_made</i>";
                    }else{
                        echo "<i class='material-icons' style='color: #32a852'>call_received</i>";
                    }
                echo "</td>";
                echo "<td>".$linha["tb05_nome"]."</td>";                
                echo "<td>R$ ". str_replace(".",",", number_format($linha["tb05_valor"],2))."</td>";
                echo "<td>".  date('d/m/Y',strtotime($linha["tb05_data"])) ."</td>";
                echo "<td>";
                    if(!($linha["tb05_id_consulta"])) { 
                        echo "<button type='button' class='mb-2 btn btn-sm btn-danger mr-1 view-modal-delete' id='".$linha["tb05_id"]."'>Remover</button>";
                    }else{
                        echo "<a class='btn' href='view-treatment.php?id=".$linha["tb05_id_consulta"]."'>Ver consulta</a>";
                    }
                echo "</td>";               
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